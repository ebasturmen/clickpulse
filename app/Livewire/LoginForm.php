<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginForm extends Component
{
    public $email = '';
    public $password = '';
    public $remember = false;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|string|min:8',
    ];

    protected function messages()
    {
        return [
            'email.required' => __('translation.email-required'),
            'email.email' => __('translation.email-invalid'),
            'password.required' => __('translation.password-required'),
            'password.min' => __('translation.password-min'),
        ];
    }

    public function mount()
    {
        // Set default email if in development
        if (app()->environment('local')) {
            $this->email = 'ebasturmen@outlook.com';
            $this->password = 'D962b8b4';
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function login()
    {
        $this->validate();

        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials, $this->remember)) {
            session()->regenerate();

            return redirect()->intended(\App\Providers\RouteServiceProvider::HOME);
        }

        throw ValidationException::withMessages([
            'email' => __('translation.login-failed'),
        ]);
    }

    public function render()
    {
        return view('livewire.login-form', [
            'showSocialLogin' => config('auth.show_social_login', false),
        ]);
    }
}

