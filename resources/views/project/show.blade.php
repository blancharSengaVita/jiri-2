<x-app-layout>
    <x-slot:title>
        {{ __('Création de Jiri') }}
    </x-slot:title>

    <livewire:create-project :projectId="$project->id"/>
</x-app-layout>
