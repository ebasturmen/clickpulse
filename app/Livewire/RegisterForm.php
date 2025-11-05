<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class RegisterForm extends Component
{
    use WithFileUploads;

    public $step = 1;
    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';
    public $avatar;
    public $payment_method = '';

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'avatar' => 'required|image|mimes:jpg,jpeg,png|max:1024',
        'payment_method' => 'required|string',
    ];

    protected function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already registered.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 8 characters.',
            'password.confirmed' => 'The password confirmation does not match.',
            'avatar.required' => 'Please upload an avatar.',
            'avatar.image' => 'The avatar must be an image.',
            'avatar.mimes' => 'The avatar must be a jpg, jpeg, or png file.',
            'avatar.max' => 'The avatar must not exceed 1MB.',
            'payment_method.required' => 'Payment method is required.',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        
        // Step değiştiğinde event dispatch et
        if ($propertyName === 'step') {
            $this->dispatch('step-updated', step: $this->step);
        }
    }

    public function register()
    {
        $this->validate();

        // Handle avatar upload
        $avatarName = null;
        if ($this->avatar) {
            $avatarName = time() . '.' . $this->avatar->getClientOriginalExtension();
            $avatarPath = public_path('/images/');
            if (!file_exists($avatarPath)) {
                mkdir($avatarPath, 0755, true);
            }
            // Move the uploaded file to public/images directory
            $this->avatar->move($avatarPath, $avatarName);
        }

        // Create user
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'avatar' => $avatarName,
        ]);

        // Create Stripe customer and setup subscription with 14-day trial
        try {
            // Create Stripe customer
            $user->createAsStripeCustomer();

            // Add payment method
            $user->updateDefaultPaymentMethod($this->payment_method);

            // Create subscription with 14-day trial
            $priceId = config('services.stripe.default_price_id', env('STRIPE_PRICE_ID'));

            if ($priceId) {
                $user->newSubscription('default', $priceId)
                    ->trialDays(14)
                    ->create($this->payment_method);
            }
        } catch (\Exception $e) {
            // Log error but don't fail registration
            \Log::error('Stripe customer creation failed: ' . $e->getMessage());
        }

        // Log the user in
        Auth::login($user);

        // Redirect to home
        return redirect()->intended(\App\Providers\RouteServiceProvider::HOME);
    }

    public function render()
    {
        return view('livewire.register-form');
    }
}

