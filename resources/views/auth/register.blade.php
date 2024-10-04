<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo"></x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="flex justify-center mb-3">
                <x-authentication-card-logo />
            </div>
            <h1 class="ml-3 text-2xl font-semibold text-center mt-6 text-purple-700">E-Complaints</h1>

            <div>
                <x-label for="name" value="{{ __('First Name') }}" class="text-purple-700" />
                <x-input id="name" class="block mt-1 w-full border-purple-700 focus:border-purple-500 focus:ring focus:ring-purple-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="middle_name" value="{{ __('Middle Name') }}" class="text-purple-700" />
                <x-input id="middle_name" class="block mt-1 w-full border-purple-700 focus:border-purple-500 focus:ring focus:ring-purple-500" type="text" name="middle_name" :value="old('middle_name')" autocomplete="middle-name" />
            </div>

            <div class="mt-4">
                <x-label for="last_name" value="{{ __('Last Name') }}" class="text-purple-700" />
                <x-input id="last_name" class="block mt-1 w-full border-purple-700 focus:border-purple-500 focus:ring focus:ring-purple-500" type="text" name="last_name" :value="old('last_name')" required autocomplete="family-name" />
            </div>

            <div class="mt-4">
                <x-label for="address" value="{{ __('Complete Address') }}" class="text-purple-700" />
                <x-input id="address" class="block mt-1 w-full border-purple-700 focus:border-purple-500 focus:ring focus:ring-purple-500" type="text" name="address" :value="old('address')" required autocomplete="street-address" />
            </div>

            <div class="mt-4">
                <x-label for="birthdate" value="{{ __('Date of Birth') }}" class="text-purple-700" />
                <x-input id="birthdate" class="block mt-1 w-full border-purple-700 focus:border-purple-500 focus:ring focus:ring-purple-500" type="date" name="birthdate" :value="old('birthdate')" required />
            </div>

            <div class="mt-4">
                <x-label for="age" value="{{ __('Age') }}" class="text-purple-700" />
                <x-input id="age" class="block mt-1 w-full border-purple-700 focus:border-purple-500 focus:ring focus:ring-purple-500" type="number" name="age" :value="old('age')" required />
            </div>
            
            <div class="mt-4">
                <x-label for="gender" value="{{ __('Gender') }}" class="text-purple-700" />
                <select id="gender" name="gender" class="block mt-1 w-full border-purple-700 focus:border-purple-500 focus:ring focus:ring-purple-500 p-2.5 rounded-md" required>
                    <option value="" disabled selected class="text-purple-700">{{ __('Select Gender') }}</option>
                    <option value="male" class="text-purple-700">{{ __('Male') }}</option>
                    <option value="female" class="text-purple-700">{{ __('Female') }}</option>
                    <option value="other" class="text-purple-700">{{ __('Other') }}</option>
                </select>
            </div>
            
            <div class="mt-4">
                <x-label for="contact_number" value="{{ __('Contact Number') }}" class="text-purple-700" />
                <x-input id="contact_number" class="block mt-1 w-full border-purple-700 focus:border-purple-500 focus:ring focus:ring-purple-500" type="tel" name="contact_number" :value="old('contact_number')" required autocomplete="tel" />
            </div>
          
            
            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" class="text-purple-700" />
                <x-input id="email" class="block mt-1 w-full border-purple-700 focus:border-purple-500 focus:ring focus:ring-purple-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" class="text-purple-700" />
                <x-input id="password" class="block mt-1 w-full border-purple-700 focus:border-purple-500 focus:ring focus:ring-purple-500" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="text-purple-700" />
                <x-input id="password_confirmation" class="block mt-1 w-full border-purple-700 focus:border-purple-500 focus:ring focus:ring-purple-500" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>
            <div class="mt-4">
                <x-label for="verification_id" value="{{ __('Verification ID') }}" class="text-purple-700" />
                <select id="verification_id" name="verification_id" class="block mt-1 w-full border-purple-700 focus:border-purple-500 focus:ring focus:ring-purple-500 p-2.5 rounded-md" required>
                    <option value="" disabled selected class="text-purple-700">{{ __('Select Verification ID') }}</option>
                    <option value="passport" class="text-purple-700">{{ __('Passport') }}</option>
                    <option value="drivers_license" class="text-purple-700">{{ __('Driver\'s License') }}</option>
                    <option value="national_id" class="text-purple-700">{{ __('National ID') }}</option>
                </select>
            </div>
            
            

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms" class="text-purple-700">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />
                            <div class="ms-2 text-purple-700">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-purple-700 hover:text-purple-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-purple-700 hover:text-purple-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-center mt-4">
                
                <x-button class="ms-4 bg-purple-700 hover:bg-purple-500">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>


        <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
        <script src="https://cdn.tailwindcss.com"></script>

    </x-authentication-card>
</x-guest-layout>
