<x-app-layout>
    <x-slot:title>
        {{ __('Création de Jiri') }}
    </x-slot:title>

    <livewire:create-jiri :jiri-id="$jiri->id" />
</x-app-layout>
