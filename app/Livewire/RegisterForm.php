<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegisterForm extends Component
{
    public $step = 1;
    
    // Step 1: Account Information
    public $website = '';
    public $email = '';
    public $password = '';
    
    // Step 2: Subscription
    public $selected_plan_id = null;
    public $selected_plan = null;
    public $payment_term = 'month'; // 'month' or 'year'
    
    // Step 3: Payment Information
    public $name = '';
    public $surname = '';
    public $payment_method_id = '';
    
    public $loading = false;

    protected $rules = [
        'website' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
        'selected_plan_id' => 'nullable',
        'name' => 'required|string|max:255',
        'surname' => 'required|string|max:255',
        'payment_method_id' => 'required|string',
    ];

    protected function messages()
    {
        return [
            'website.required' => __('auth.register_website') . ' ' . __('global.is_required'),
            'email.required' => __('global.email') . ' ' . __('global.is_required'),
            'email.email' => __('global.email_invalid'),
            'email.unique' => __('auth.email_already_registered'),
            'password.required' => __('global.password') . ' ' . __('global.is_required'),
            'password.min' => __('global.password_min'),
            'selected_plan_id.required' => __('auth.plan_required'),
            'name.required' => __('global.name') . ' ' . __('global.is_required'),
            'surname.required' => __('global.surname') . ' ' . __('global.is_required'),
            'payment_method_id.required' => __('auth.payment_method_required'),
        ];
    }

    public function mount()
    {
        // Load default plan (you can set this based on your business logic)
        $this->loadDefaultPlan();
    }

    protected function loadDefaultPlan()
    {
        // Load first available plan or default plan
        // Adjust this query based on your Plan model structure
        try {
            if (DB::getSchemaBuilder()->hasTable('plans')) {
                $plan = DB::table('plans')->where('is_active', true)->orderBy('price')->first();
                
                if ($plan) {
                    $this->selected_plan_id = $plan->id;
                    $this->selected_plan = (object) $plan;
                    $this->loadPlan();
                }
            }
        } catch (\Exception $e) {
            // Plan table doesn't exist, use default values
            $this->selected_plan = (object) [
                'id' => 1,
                'title' => 'Basic Plan',
                'price' => 0,
                'features' => collect([]),
            ];
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        
        // Step değiştiğinde event dispatch et
        if ($propertyName === 'step') {
            $this->dispatch('step-updated', step: $this->step);
        }
        
        // Plan değiştiğinde plan bilgilerini yükle
        if ($propertyName === 'selected_plan_id') {
            $this->loadPlan();
        }
    }

    protected function loadPlan()
    {
        if ($this->selected_plan_id) {
            try {
                if (DB::getSchemaBuilder()->hasTable('plans')) {
                    $plan = DB::table('plans')->where('id', $this->selected_plan_id)->first();
                    
                    if ($plan) {
                        // Load plan features if table exists
                        $features = collect([]);
                        if (DB::getSchemaBuilder()->hasTable('plan_feature') && DB::getSchemaBuilder()->hasTable('features')) {
                            $features = DB::table('plan_feature')
                                ->where('plan_id', $plan->id)
                                ->join('features', 'plan_feature.feature_id', '=', 'features.id')
                                ->select('features.*', 'plan_feature.charges')
                                ->get();
                        }
                        
                        $plan->features = $features;
                        $this->selected_plan = (object) $plan;
                    }
                }
            } catch (\Exception $e) {
                \Log::error('Failed to load plan: ' . $e->getMessage());
            }
        }
    }

    public function firstStepSubmit()
    {
        $this->validate([
            'website' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $this->step = 2;
        $this->dispatch('step-updated', step: $this->step);
    }

    public function secondStepSubmit()
    {
        // Validate plan if plans table exists
        if (DB::getSchemaBuilder()->hasTable('plans')) {
            $this->validate([
                'selected_plan_id' => 'required|exists:plans,id',
            ]);
        }

        $this->loadPlan();
        $this->step = 3;
        $this->dispatch('step-updated', step: $this->step);
    }

    public function backStep()
    {
        if ($this->step > 1) {
            $this->step--;
            $this->dispatch('step-updated', step: $this->step);
        }
    }

    public function finishRegistration()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'payment_method_id' => 'required|string',
        ]);

        $this->loading = true;

        try {
            DB::beginTransaction();

            // Create user
            $user = User::create([
                'name' => $this->name . ' ' . $this->surname,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);

            // Create Stripe customer and setup subscription with 14-day trial
            $user->createAsStripeCustomer();

            // Add payment method
            $user->updateDefaultPaymentMethod($this->payment_method_id);

            // Get plan's Stripe price ID
            $stripePriceId = config('services.stripe.default_price_id', env('STRIPE_PRICE_ID'));
            
            if ($this->selected_plan_id && DB::getSchemaBuilder()->hasTable('plans')) {
                $plan = DB::table('plans')->where('id', $this->selected_plan_id)->first();
                if ($plan && isset($plan->stripe_price_id)) {
                    $stripePriceId = $plan->stripe_price_id;
                }
            }

            if ($stripePriceId) {
                // Create subscription with 14-day trial
                $user->newSubscription('default', $stripePriceId)
                    ->trialDays(14)
                    ->create($this->payment_method_id);
            }

            DB::commit();

            // Log the user in
            Auth::login($user);

            // Redirect to home
            return redirect()->intended(\App\Providers\RouteServiceProvider::HOME);

        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Registration failed: ' . $e->getMessage());
            
            $this->addError('registration', __('auth.registration_failed'));
            $this->loading = false;
        }
    }

    public function render()
    {
        // Load plan features if plan is selected
        if ($this->selected_plan && !isset($this->selected_plan->features)) {
            $this->loadPlan();
        }

        return view('livewire.register-form', [
            'stripeKey' => config('services.stripe.key', env('STRIPE_KEY')),
        ]);
    }
}
