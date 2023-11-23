<nav class="menu__nav nav">
    <!-- Navigation Links -->
    <h2 class="sro"> menu de navigation principale </h2>
    <ul class="nav__list">
        <li class="nav__item {{request()->routeIs('dashboard') ? 'nav__item--active' : ''}}">
            <a class="nav__link" href="{{route('dashboard')}}">
                {{ __('Dashboard') }}
            </a>
        </li>
        <li class="nav__item {{request()->routeIs('dashboard') ? 'nav__item--active' : ''}}">
            <a class="nav__link" href="{{route('dashboard')}}">
                {{ __('Jiri') }}
            </a>
        </li>
        <li class="nav__item {{request()->routeIs('dashboard') ? 'nav__item--active' : ''}}">
            <a class="nav__link" href="{{route('dashboard')}}">
                {{ __('Contact') }}
            </a>
        </li>
        <li class="nav__item {{request()->routeIs('dashboard') ? 'nav__item--active' : ''}}">
            <a class="nav__link" href="{{route('dashboard')}}">
                {{ __('Projet') }}
            </a>
        </li>
    </ul>
</nav>

{{-- on garder le logout, on garde aussi la route vers le profile edit, on garde --}}
