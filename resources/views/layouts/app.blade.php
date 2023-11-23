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
<h1 class="sro"> Dashboard </h1>
<main class="app-layout">
    <div class="app-layout__container">
        <p class="app-layout__logo">jiri</p>
        <p> menu </p>
        @include('layouts.navigation')
    </div>

    <div class="app-layout__container">
        <x-responsive-nav-link :href="route('profile.edit')">
            {{ __('Profile') }}
        </x-responsive-nav-link>
        {{ $slot }}
    </div>
</main>
</body>
</html>
