<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactRow extends Component
{
    public Contact $contact;

    public function editThisContact($contactId): void
    {
        $this->dispatch('editThisContact', contactId: $contactId)->to(CreateContact::class);
    }

    public function render()
    {
        return view('livewire.contact-row');
    }
}
