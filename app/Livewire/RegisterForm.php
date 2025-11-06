<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegisterForm extends Component
{
    public $step = 2;

    // Step 1: Account Information
    public $website = '';
    public $email = '';
    public $password = '';

    // Step 2: Subscription
    public $selected_plan_id = null;
    public $selected_plan = null;
    public $payment_term = 'month'; // 'month' or 'year'

    public $loading = false;

    protected $rules = [
        'website' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
        'selected_plan_id' => 'nullable',
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
        ];
    }

    public function mount()
    {
        // Load default plan (you can set this based on your business logic)
        $this->loadDefaultPlan();
    }

    protected function loadDefaultPlan()
    {
        $plan = DB::table('plans')
                        ->where('id', 1)
                        ->first();

        if ($plan) {
                    $this->selected_plan_id = $plan->id;
                    $this->selected_plan = (object) $plan;
                    $this->loadPlan();
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

        // Step değiştiğinde event dispatch et
        if ($propertyName === 'step') {
            $this->dispatch('step-updated', step: $this->step);
        }

        // Payment term değiştiğinde Basic planı yeniden yükle
        if ($propertyName === 'payment_term') {
            $this->loadDefaultPlan();
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
    }

    public function backStep()
    {
        if ($this->step > 1) {
            $this->step--;
            $this->dispatch('step-updated', step: $this->step);
        }
    }

    public function render()
    {
        // Load plan features if plan is selected
        if ($this->selected_plan && !isset($this->selected_plan->features)) {
            $this->loadPlan();
        }

        return view('livewire.register-form');
    }
}
