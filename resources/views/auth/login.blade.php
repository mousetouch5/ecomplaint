<x-guest-layout>
    <x-authentication-card class="py-8"> <!-- Adjust the padding as needed -->
        <x-slot name="logo">
            <div class="flex items-center">
                <x-authentication-card-logo />
                <h1 class="ml-3 text-2xl font-semibold">E-Complaints</h1> <!-- Adjust styling as needed -->
            </div>
        </x-slot>
        
        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <div class="text-center text-gray-500 mb-6"> <!-- Center and set text color -->
            <h1 class="text-xl font-bold text-purple-700 !important">Login To Your Account</h1>
            <p class="text-sm">Enter your username & password to login</p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <div>
                <x-label class="text-5xl block text-purple-700" for="email" value="{{ __('Username') }}" /> <!-- Changed text size to 5xl -->
                <label class="input input-bordered flex items-center gap-2 mt-1"> <!-- Add input styling -->
                    <span class="text-gray-700 opacity-70 text-2xl">@</span> <!-- Add '@' symbol -->
                    <x-input id="email" class="grow border-none focus:outline-none focus:ring-0" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Enter your email" />
                </label>
            </div>
            
            <div class="mt-4">
                <x-label class="text-5xl text-purple-700" for="password" value="{{ __('Password') }}" /> <!-- Changed text size to 5xl -->
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>
            
            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-1xl text-purple-700">{{ __('Remember me') }}</span>
                </label>
            </div>
            
            <div class="flex justify-center mt-4 text-center"> <!-- Add a flex container to center the button -->
                <x-button class="bg-purple-700 text-white text-center mx-auto"> <!-- Set width to 52 and ensure text is visible -->
                    {{ __('Log in') }}
                </x-button>
            </div>

            <div class="flex items-center justify-center mt-4"> <!-- Center the forgot password link -->
              
                
              
                
                <span class="text-sm text-gray-600">Do you have an account?</span>
                <a href="{{ route('register') }}" class="underline text-sm text-gray-600 hover:text-purple-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Create an account
                </a>
            </div>
            
        </form>
        <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
        <script src="https://cdn.tailwindcss.com"></script>

    </x-authentication-card>
</x-guest-layout>
