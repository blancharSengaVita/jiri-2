<x-app-layout>
    <x-slot:title>
        {{ __('Dashboard') }}
    </x-slot:title>

    <p class="title--1" > {{ __('Aucun Jury pour l\'instant')  }} </p>
    <div class="dashboard">
        <div class="box dashboard__">
            <p class="dashboard__text--no-jury" > {{ __('Aucun Jiri n’a été créer, voulez-vous un créer un ?')  }} </p>
            <a class="dashboard__button" href="jiries/create"> {{ __('En créer')  }}  </a>
        </div>
    </div>
</x-app-layout>
