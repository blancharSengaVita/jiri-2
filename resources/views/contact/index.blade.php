<x-app-layout>
    <x-slot:title>
        {{ __('Liste des contact') }}
    </x-slot:title>

    <livewire:contact-list :user="$user" />


</x-app-layout>
