<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label dusk="email__label" for="email" :value="__('login.Email')" />
            <x-text-input dusk="email__input"  id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')"/>

            <label for="email"></label>
            <x-input-error dusk="email__error" :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label dusk="password__label" for="password" :value="__('login.Password')" />

            <x-text-input dusk="password__input" id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
            />

            <x-input-error dusk="password__error" :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('login.Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('login.Forgot your password?') }}
                </a>
            @endif

            <x-primary-button dusk="login__button" class="ms-3">
                {{ __('login.Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
