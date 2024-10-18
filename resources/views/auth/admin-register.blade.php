<x-guest-layout>
    <x-authentication-card class="py-8">
        <x-slot name="logo">
            <div class="flex items-center">
                <x-authentication-card-logo />
                <h1 class="ml-3 text-2xl font-semibold">Admin Registration</h1>
            </div>
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('admin.register') }}">
            @csrf

            <div class="mt-4">
                <x-label for="name" value="{{ __('Name') }}" class="text-purple-700" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" required autofocus placeholder="Enter your name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" class="text-purple-700" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" required placeholder="Enter your email" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" class="text-purple-700" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required placeholder="Enter your password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="text-purple-700" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required placeholder="Confirm your password" />
            </div>

            <div class="flex justify-center mt-4">
                <x-button class="bg-purple-700 text-white flex justify-center w-full">
                    {{ __('Register') }}
                </x-button>
            </div>
            
        </form>

    </x-authentication-card>
</x-guest-layout>
