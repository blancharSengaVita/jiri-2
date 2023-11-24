<x-app-layout>
    <x-slot:title>
        {{ __('Dashboard') }}
    </x-slot:title>

    <p class="title--1" > {{ __('Aucun Jury pour l\'instant')  }} </p>
    <div class="box">
        <p> {{ __('Aucun jury n’a été créer, voulez-vous un créer un ?')  }} </p>
        <a class="button" href="jiri/create"> {{ __('En créer')  }}  </a>
    </div>
</x-app-layout>
