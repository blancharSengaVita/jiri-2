<x-app-layout>
    <x-slot:title>
        {{ __('Liste des contacts') }}
    </x-slot:title>

    <main class="jiries">
        <div class="jiries__container">
            <h2 class="sro">  {{ __('Liste des contacts')  }} </h2>
            <p class="title--1 jiries__title">
                {{ __('Liste des contacts')  }}
            </p>
            <div class="jiries__container--button">
                <a class="jiries__button" x-show="isCreateContactModal" > Créer un contact</a>
                <button class="jiries__button"> Voir la corbeille</button>
            </div>
        </div>
        <input class="jiries__search" type="text" placeholder="Rechercher">

        <livewire:contact-list :user="$user"/>
    </main>
</x-app-layout>
