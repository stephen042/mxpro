<?php

use App\Models\User;
use App\Mail\AppMail;
use App\Models\Account;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use Illuminate\Support\Facades\Mail;

new #[Layout('components.layouts.auth')] class extends Component {
    public string $name = '';
    public string $email = '';
    public string $country = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $unHashedPassword = $validated['password'];

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(($user = User::create($validated))));

        // create accounts for the user
        $result = Account::create([
            'user_id' => $user->id,
            'solana_balance' => 0,
            'usdt_balance' => 0,
            'polygon_balance' => 0,
            'bitcoin_balance' => 0,
            'ethereum_balance' => 0,
            'ripple_balance' => 0,
        ]);

        if ($result) {
            $app = config('app.name');
            $userEmail = $validated['email'];
            $password = $unHashedPassword;

            $full_name = $validated['name'];
            $subject = "Welcome Notification";


            $bodyUser = [
                "name" => $full_name,
                "title" => "Registration",
                "message" => "Welcome aboard! We are thrilled to have you join $app – your gateway to the world of trading and investment opportunities.
                At $app, we are committed to providing you with a seamless and rewarding trading experience. Whether you are a seasoned investor or just starting out, our platform offers a comprehensive suite of tools and resources to help you achieve your financial goals.
                <br>
                <br>
                Your login Details are : <br>
                email = $userEmail, <br>
                password = $password <br>
                ",
            ];
            $bodyAdmin = [
                "name" => "Admin",
                "title" => "Registration",
                "message" => " Hello Admin a User by the name $full_name have successfully created an Account on $app . Please check it out ;
                ",
            ];

            try {
                // user email
                Mail::to($userEmail)->send(new AppMail($subject, $bodyUser));

                // Admin email
                Mail::to(config('app.Admin_email'))->send(new AppMail($subject, $bodyAdmin));
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
        
        // Auth::login($user);

        $this->redirectIntended(route('login', absolute: false), navigate: true);
    }
}; ?>

<div class="flex flex-col gap-6">
    <x-auth-header :title="__('Create an account')"
        :description="__('Enter your details below to create your account')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="register" class="flex flex-col gap-6">
        @php
        $countries = [
        "Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola",
        "Argentina", "Armenia", "Australia", "Austria", "Azerbaijan", "Bahamas",
        "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin",
        "Bhutan", "Bolivia", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso",
        "Burundi", "Cambodia", "Cameroon", "Canada", "Chad", "Chile", "China",
        "Colombia", "Costa Rica", "Croatia", "Cuba", "Cyprus", "Czech Republic",
        "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt",
        "El Salvador", "Estonia", "Ethiopia", "Fiji", "Finland", "France", "Gabon",
        "Gambia", "Georgia", "Germany", "Ghana", "Greece", "Guatemala", "Guinea",
        "Honduras", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq",
        "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan",
        "Kenya", "Kuwait", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya",
        "Lithuania", "Luxembourg", "Malaysia", "Malawi", "Maldives", "Mali", "Malta",
        "Mexico", "Moldova", "Monaco", "Mongolia", "Morocco", "Mozambique",
        "Myanmar", "Namibia", "Nepal", "Netherlands", "New Zealand", "Nicaragua",
        "Niger", "Nigeria", "Norway", "Oman", "Pakistan", "Palestine", "Panama",
        "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Qatar", "Romania",
        "Russia", "Rwanda", "Saudi Arabia", "Senegal", "Serbia", "Singapore", "Slovakia",
        "Slovenia", "South Africa", "South Korea", "South Sudan", "Spain", "Sri Lanka",
        "Sudan", "Sweden", "Switzerland", "Syria", "Taiwan", "Tanzania", "Thailand",
        "Togo", "Trinidad & Tobago", "Tunisia", "Turkey", "Uganda", "Ukraine",
        "United Arab Emirates", "United Kingdom", "United States", "Uruguay",
        "Uzbekistan", "Vatican City", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe"
        ];
        @endphp

        <!-- Name -->
        <flux:input wire:model="name" :label="__('Name')" type="text" required autofocus autocomplete="name"
            :placeholder="__('Full name')" />

        <!-- Email Address -->
        <flux:input wire:model="email" :label="__('Email address')" type="email" required autocomplete="email"
            placeholder="email@example.com" />


        <!-- Country -->
        <flux:select wire:model="country" :label="__('Select Country')" placeholder="{{ __('Select Country') }}">
            @foreach($countries as $country)
            <flux:select.option value="{{ $country }}">{{ $country }}</flux:select.option>
            @endforeach
        </flux:select>


        <!-- Password -->
        <flux:input wire:model="password" :label="__('Password')" type="password" required autocomplete="new-password"
            :placeholder="__('Password')" />

        <!-- Confirm Password -->
        <flux:input wire:model="password_confirmation" :label="__('Confirm password')" type="password" required
            autocomplete="new-password" :placeholder="__('Confirm password')" />

        <div class="flex items-center justify-end">
            <flux:button type="submit" variant="primary" class="w-full">
                {{ __('Create account') }}
            </flux:button>
        </div>
    </form>

    <div class="space-x-1 text-center text-sm text-zinc-600 dark:text-zinc-400">
        {{ __('Already have an account?') }}
        <flux:link :href="route('login')" wire:navigate>{{ __('Log in') }}</flux:link>
    </div>
</div>