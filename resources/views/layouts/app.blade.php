<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title . ' - ' . config('app.name', 'Laravel')}}</title>

    <!-- Scripts -->
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body class="">
<!-- Page Content -->
<div class="app-layout">
<h1 class="sro"> Dashboard </h1>
    <header class="app-layout__container menu">
        <p class="menu__logo">jiri</p>
        @include('layouts.navigation')
        <div class="menu__logout logout">
            <form class="logout__form" method="POST" action="{{ route('logout') }}">
                @csrf
                <x-responsive-nav-link :href="route('logout')"
                                       onclick="event.preventDefault();
                                        this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>
            <!-- Authentication -->
        </div>
    </header>

    <main class="app-layout__container">
        <div class="profil" >
            <div class="profil__card">
                <p class="" >{{ Auth::user()->name }}</p>
            </div>
        </div>
        {{ $slot }}
    </main>

</div>
</body>
</html>
