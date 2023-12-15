<x-app-layout>
    <x-slot:title>
        {{ __('Liste des projets') }}
    </x-slot:title>

    <main class="jiries projects">
        <div class="jiries__container">
            <h2 class="sro">  {{ __('Liste des projets')  }} </h2>
            <p class="title--1 jiries__title">
                {{ __('Liste des projets')  }}
            </p>
            <div class="jiries__container--button">
                <a class="jiries__button" x-show="isCreateContactModal"> Créer un projet</a>
                <button class="jiries__button"> Voir la corbeille</button>
            </div>
        </div>
        <input class="jiries__search" type="text" placeholder="Rechercher">

        <ul class="projects__list">
            @foreach($user->projects as $project)
                <li class="jiries__item jiri">
                    <div class="jiri__container--text">
                        <p class="jiri__name">{{ $project->name  }}</p>
                    </div>

                    <div class="jiri__container--button">
                        <a class="jiri__button button">
                            <svg class="button__icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path fill="currentColor" d="M8 6.003a2.667 2.667 0 1 1 0 5.334a2.667 2.667 0 0 1 0-5.334m0 1a1.667 1.667 0 1 0 0 3.334a1.667 1.667 0 0 0 0-3.334m0-3.336c3.076 0 5.73 2.1 6.467 5.043a.5.5 0 1 1-.97.242a5.67 5.67 0 0 0-10.995.004a.5.5 0 0 1-.97-.243A6.669 6.669 0 0 1 8 3.667"/></svg> </a>
                        <form action="/projets/{{ $project->id }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="jiri__button button">
                                <svg class="button__icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path fill="currentColor" fill-rule="evenodd" d="M10 3h3v1h-1v9l-1 1H4l-1-1V4H2V3h3V2a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1zM9 2H6v1h3zM4 13h7V4H4zm2-8H5v7h1zm1 0h1v7H7zm2 0h1v7H9z" clip-rule="evenodd"/></svg>
                            </button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>

</x-app-layout>
