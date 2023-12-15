<x-app-layout>
    <x-slot:title>
        {{ __('Liste des jiries') }}
    </x-slot:title>


    <main class="jiries">
        <div class="jiries__container">
            <h2 class="sro">  {{ __('Liste des jiries')  }} </h2>
            <p class="title--1 jiries__title">
                {{ __('Liste des jiries')  }}
            </p>
            <div class="jiries__container--button" >
                <a class="jiries__button" href="/jiries/create"> Créer un jiri</a>
                <button class="jiries__button"> Historique des jiries</button>
            </div>
        </div>
        <input class="jiries__search" type="text" placeholder="Rechercher">

        <ul class="jiries__list">
            @foreach($user->jiris as $jiri)
                <li class="jiries__item jiri">
                    <div class="jiri__container--text" >
                        <p class="jiri__name"> {{ $jiri->name }} </p>
                        <p class="jiri__date"> {{ $jiri->starting_at }} </p>
                    </div>
                    <div class="jiri__container--button" >
                        <button class="jiri__button button">
                            <svg class="button__icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path fill="currentColor" d="M3.78 2L3 2.41v12l.78.42l9-6V8zM4 13.48V3.35l7.6 5.07z"/></svg>
                        </button>

                        <a href="/jiries/{{ $jiri->id }}" class="jiri__button button">
                            <svg class="button__icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path fill="currentColor" d="M8 6.003a2.667 2.667 0 1 1 0 5.334a2.667 2.667 0 0 1 0-5.334m0 1a1.667 1.667 0 1 0 0 3.334a1.667 1.667 0 0 0 0-3.334m0-3.336c3.076 0 5.73 2.1 6.467 5.043a.5.5 0 1 1-.97.242a5.67 5.67 0 0 0-10.995.004a.5.5 0 0 1-.97-.243A6.669 6.669 0 0 1 8 3.667"/></svg>
                        </a>

                        <form action="/jiries/{{ $jiri->id }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="jiri__button button" type="submit">
                                <svg class="button__icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path fill="currentColor" fill-rule="evenodd" d="M10 3h3v1h-1v9l-1 1H4l-1-1V4H2V3h3V2a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1zM9 2H6v1h3zM4 13h7V4H4zm2-8H5v7h1zm1 0h1v7H7zm2 0h1v7H9z" clip-rule="evenodd"/></svg>
                            </button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
        <div  class="jiries__container--single-button" >
            <a class="jiries__button" href="/jiries/create"> Créer un jiri</a>
        </div>
    </main>
</x-app-layout>
