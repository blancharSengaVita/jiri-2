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
            <div>
                <button class="jiries__button"> Créer un jiries</button>
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
                        <a href="" class="button jiri__button"> Start </a>
                        <a href="/jiries/{{ $jiri->id }}" class="button jiri__button"> Show </a>
                        <form action="/jiries/{{ $jiri->id }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="jiri__button"
                                    type="submit">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
        <div  class="jiries__container--single-button" >
            <button > Créer un jiries</button>
        </div>
    </main>
</x-app-layout>
