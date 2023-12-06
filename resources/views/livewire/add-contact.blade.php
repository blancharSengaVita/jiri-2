<div>
    <input wire:model.live="search" type="search">
    <h2> Not selected </h2>
    <ul>
        @foreach($this->filteredContacts as $contact)
            <li wire:key="{{$contact->id}}">
                <label for="contact-{{ $contact->id }}">{{ $contact->name }}
                    <input
                        wire:click="addToJiri({{ $contact }})"
                        value="{{ $contact->name }}"
                        type="checkbox"
                        id="contact-{{ $contact->id }}">
                </label>
            </li>
        @endforeach
    </ul>

    <h2> Selected </h2>
    <ul>
        @foreach($this->addedTojury as $contact)
            <li wire:key="{{$contact->id}}">
                <label
                    for="contact-{{ $contact->id }}">{{ $contact->name }}
                    <input
                        wire:click="deleteFromJiri({{ $contact }})"
                        value="{{ $contact->name }}"
                        type="checkbox"
                        id="selectedContact-{{ $contact->id }}">
                </label>
            </li>
        @endforeach
    </ul>

    <button x-on:click="{{ $modal }} = false"> enregistrer</button>
</div>
