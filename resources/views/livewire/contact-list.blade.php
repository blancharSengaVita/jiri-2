<div
    class="contact-list"
    x-data="{
          'isCreateContactModal': @entangle('isCreateContactModal'),
          }"
    x-on:keydown.escape="
          isCreateContactModal = false;
          "
>
    <table class="contact-list__table table">
        <thead class="table__header">
        <tr class="table__row">
            <th class="table__head"> Image</th>
            <th class="table__head"> Nom</th>
            <th class="table__head"> Email</th>
            <th class="table__head"> Télephone</th>
            <th class="table__head"> Action</th>
        </tr>
        </thead>
            <tbody>
            @foreach($user->contacts as $contact)
                <tr>
                    <td> Image à mettre</td>
                    <td> {{ $contact->name }} </td>
                    <td> {{ $contact->email }} </td>
                    <td> {{ $contact->phone }} </td>
                    <td class="contact-list__action">
                        <button class="contact-list__button button" wire:click="editThisContact({{ $contact->id}})">
                            <svg class="contact-list__svg" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                <path fill="currentColor" d="M13.23 1h-1.46L3.52 9.25l-.16.22L1 13.59L2.41 15l4.12-2.36l.22-.16L15 4.23V2.77zM2.41 13.59l1.51-3l1.45 1.45zm3.83-2.06L4.47 9.76l8-8l1.77 1.77z"/>
                            </svg>
                        </button>
                        <button class="contact-list__button button" wire:click="deleteThisContact({{ $contact->id}})">
                            <svg class="contact-list__svg" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                <path fill="currentColor" fill-rule="evenodd" d="M10 3h3v1h-1v9l-1 1H4l-1-1V4H2V3h3V2a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1zM9 2H6v1h3zM4 13h7V4H4zm2-8H5v7h1zm1 0h1v7H7zm2 0h1v7H9z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
    </table>

    <div class="jiries__container--single-button">
        <button class="jiries__button" wire:click="createContact">Créer un contact</button>
    </div>
    <div x-show="isCreateContactModal">
        <livewire:create-contact/>
    </div>
</div>
