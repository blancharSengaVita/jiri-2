<div
    x-data="{
          'isCreateContactModalOpen': false,
          'isModifyContactModalOpen': false,
          'eventId' : '',
          }"
     x-on:keydown.escape="
          isCreateContactModalOpen = false;
          isModifyContactModalOpen = false;
          "
>
    <table>
        <thead>
        <th>

        </th>
        </thead>
        <tbody   >
        @foreach($user->contacts as $contact)
{{--            <livewire:contact-row key="$contact->id" :$contact/>--}}
<tr>
    <td> Image à mettre</td>
    <td> {{ $contact->name }} </td>
    <td> {{ $contact->phone }} </td>
    <td> {{ $contact->email }} </td>
    <td>
        <button x-on:click="isCreateContactModalOpen = true" wire:click="editThisContact({{ $contact->id}})"> Modifier </button>
        <button wire:click="deleteThisContact({{ $contact->id}})"> Supprimer </button>
    </td>
</tr>
        @endforeach
        </tbody>
    </table>

    <button type="button" wire:click="$refresh" > refresh </button>

    <button
        wire:click="createContact"
        x-on:click="isCreateContactModalOpen = $wire.modal">  Créer un contact</button>
    <div x-show="isCreateContactModalOpen">
        <livewire:create-contact />
    </div>
</div>
