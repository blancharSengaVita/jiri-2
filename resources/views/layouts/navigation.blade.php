<nav class="nav" >
        <!-- Navigation Links -->
        <div class="nav__container">
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-nav-link>
        </div>

        <!-- Responsive Settings Options -->

        <div class="">
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-responsive-nav-link :href="route('logout')"
                                       onclick="event.preventDefault();
                                        this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>
            <!-- Authentication -->
        </div>

</nav>

{{-- on garder le logout, on garde aussi la route vers le profile edit, on garde --}}
