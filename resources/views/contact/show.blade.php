<x-app-layout>
    <x-slot:title>
        {{ __('Modifier le contact') }}
    </x-slot:title>

    <livewire:create-contact :contact-id="$contact->id" />
</x-app-layout>
