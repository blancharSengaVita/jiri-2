<div>
    <input wire:model.live="search" type="search">
    <h2> Not selected </h2>
    <ul>
        @foreach($this->filteredContacts as $contact)
            <li wire:key="{{$contact->id}}">
                <label for="contact-{{ $contact->id }}">{{ $contact->name }}</label>
                <input
                    wire:click="addContactToContactsToAddToJiri({{ $contact }})"
                    value="{{ $contact->name }}"
                    type="checkbox"
                    id="contact-{{ $contact->id }}">
            </li>
        @endforeach
    </ul>

    <h2> Selected </h2>
    <ul>
        @foreach($contactsToAddToJiri as $contact)
            <li wire:key="{{$contact->id}}">
                <label
                    for="contact-{{ $contact->id }}">{{ $contact->name }}</label>
                <input
                    wire:click="addContactToContactsToAddToJiri({{ $contact }})"
                    value="{{ $contact->name }}"
                    type="checkbox"
                    id="selectedContact-{{ $contact->id }}">
            </li>
        @endforeach
    </ul>

    <button wire:click="save" x-on:click="isModalOpen = false"> enregistrer</button>
</div>
