<x-app-layout>
    <x-slot:title>
        {{ __('Liste des projets') }}
    </x-slot:title>

    <main class="jiries projects"
{{--          x-data="{--}}
{{--          'isCreateProjectModal': false,--}}
{{--          }"--}}
    >
        <div class="jiries__container">
            <h2 class="sro">  {{ __('Liste des projets')  }} </h2>
            <p class="title--1 jiries__title">
                {{ __('Liste des projets')  }}
            </p>
            <div class="jiries__container--button">
                <a class="jiries__button" x-on:click="isCreateProjectModal = true"> Créer un projet</a>
                <button class="jiries__button"> Voir la corbeille</button>
            </div>
        </div>
        <input class="jiries__search" type="text" placeholder="Rechercher">

        <livewire:project-list :user="$user"/>
</main>
</x-app-layout>
