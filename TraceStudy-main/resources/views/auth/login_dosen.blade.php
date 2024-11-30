<x-guest-layout>
    <style>
        body {
            background-color: #f2f7ff;
        }
    </style>
    <form method="POST" action="{{ route('login.dosen') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email Dosen')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-3">
                {{ __('Log in as Dosen') }}
            </x-primary-button>
        </div>

        <div class="mt-4 text-center">
            <p class="text-sm text-gray-600">
                {{ __('Don\'t have an account?') }} 
                <a href="{{ route('register.dosen') }}" class="text-indigo-600 hover:text-indigo-500">
                    {{ __('Register as Dosen') }}
                </a>
            </p>
        </div>
    </form>
</x-guest-layout> 