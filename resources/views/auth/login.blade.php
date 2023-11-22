<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')"/>

    <form class="form auth" method="POST" action="{{ route('login') }}">
        @csrf
        <h2 class="form__title auth__title"> {{ __('login.Log in') }} </h2>

        <!-- Email Address -->
        <div class="field auth__field">
            <x-input-label class="field__label auth__label" dusk="email__label" for="email" :value="__('login.Email')"/>
            <x-text-input class="field__input auth__input" dusk="email__input" id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
        </div>

        <!-- Password -->
        <div class="field auth__field">
            <x-input-label class="field__label auth__label" dusk="password__label" for="password" :value="__('login.Password')"/>

            <x-text-input class="field__input auth__input" dusk="password__input" id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
            />

            <x-input-error class="error auth__error" dusk="password__error" :messages="$errors->get('password')" class="mt-2"/>
        </div>

        <!-- Remember Me -->
        {{--        <div class="block mt-4">--}}
        {{--            <label for="remember_me" class="inline-flex items-center">--}}
        {{--                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">--}}
        {{--                <span class="ms-2 text-sm text-gray-600">{{ __('login.Remember me') }}</span>--}}
        {{--            </label>--}}
        {{--        </div>--}}




        <!-- Log in -->
        <div class="container form__container auth__container auth__container--button">
            <x-primary-button type="submit">
                {{ __('login.Log in') }}
            </x-primary-button>
        </div>

{{--        <hr>--}}
        <!-- Forgot your password and Register -->
        <div class="container--link auth__container--link">
            @if (Route::has('password.request'))
                <a class="auth__link form__link--tiny" href="{{ route('password.request') }}">
                    {{ __('login.Forgot your password?') }}
                </a>
            @endif

            @if (Route::has('register'))
                <a class="auth__link form__link--tiny" href="{{ route('register') }}">
                    {{ __('login.Register?') }}
                </a>
            @endif
        </div>
    </form>
</x-guest-layout>
