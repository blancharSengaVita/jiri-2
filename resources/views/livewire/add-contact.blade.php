<div class="create-jiri__add-contact add-contact">
    <div class="add-contact__container" x-on:click.outside="{{ $modal }} = false">
        <p class="title--1"> Ajouter un étudiant </p>

        <div class="add-contact__container--search">
            <input class="add-contact__search search" wire:model.live="search" type="search">
            <svg class="search__svg" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="currentColor" d="M15.25 0a8.25 8.25 0 0 0-6.18 13.72L1 22.88l1.12 1l8.05-9.12A8.251 8.251 0 1 0 15.25.01zm0 15a6.75 6.75 0 1 1 0-13.5a6.75 6.75 0 0 1 0 13.5"/>
            </svg>
        </div>


        <div class="add-contact__container--list">
            <div class="add-contact__list list">
                <p class="title--2 list__title"> Not selected </p>
                <ul class="list__container">
                    @foreach($this->filteredContacts as $contact)
                        <li class="list__item contact" wire:key="{{$contact->id}}" wire:click="addToJiri({{ $contact->id }})">
                            <input
                                class="display-none"
                                value="{{ $contact->name }}"
                                type="checkbox"
                                id="contact-{{$role}}-{{ $contact->id }}"
                            >
                            <label class="contact__card" for="contact-{{$role}}-{{ $contact->id }}">{{ $contact->name }}
                            </label>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="add-contact__list list">
                <p class="title--2 list__title"> Selected </p>
                <ul>
                    @foreach($this->addedTojury as $contact)
                        <li class="list__item contact--selected" wire:key="{{$contact->id}}"
                            wire:click="deleteFromJiri({{ $contact }})">
                            <input
                                class="display-none"
                                value="{{ $contact->name }}"
                                type="checkbox"
                                id="selectedContact-{{$role}}-{{ $contact->id }}">
                            <label
                                class="contact__card--selected"
                                for="selectedContact-{{$role}}-{{ $contact->id }}">{{ $contact->name }}
                                <svg class="selected-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                    <path fill="currentColor" fill-rule="evenodd" d="m14.431 3.323l-8.47 10l-.79-.036l-3.35-4.77l.818-.574l2.978 4.24l8.051-9.506z" clip-rule="evenodd"/>
                                </svg>
                            </label>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div>
            <button x-on:click="{{ $modal }} = false"> enregistrer</button>
        </div>
    </div>
</div>
