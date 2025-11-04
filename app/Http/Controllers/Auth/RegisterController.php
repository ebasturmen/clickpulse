<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'avatar' => ['required', 'image' ,'mimes:jpg,jpeg,png','max:1024'],
            'payment_method' => ['required', 'string'], // Stripe payment method token
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // Handle avatar upload
        if (request()->has('avatar')) {
            $avatar = request()->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = public_path('/images/');
            $avatar->move($avatarPath, $avatarName);
        }

        // Create user
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'avatar' => $avatarName,
        ]);

        // Create Stripe customer and setup subscription with 14-day trial
        try {
            // Create Stripe customer
            $user->createAsStripeCustomer();

            // Add payment method
            $user->updateDefaultPaymentMethod($data['payment_method']);

            // Create subscription with 14-day trial
            // Note: You'll need to create a price in Stripe dashboard first
            // Replace 'price_xxxxx' with your actual Stripe price ID
            $priceId = config('services.stripe.default_price_id', env('STRIPE_PRICE_ID'));
            
            if ($priceId) {
                $user->newSubscription('default', $priceId)
                    ->trialDays(14)
                    ->create($data['payment_method']);
            }
        } catch (\Exception $e) {
            // Log error but don't fail registration
            \Log::error('Stripe customer creation failed: ' . $e->getMessage());
            // Optionally delete user if Stripe setup is critical
            // $user->delete();
            // throw $e;
        }

        return $user;
    }
}
