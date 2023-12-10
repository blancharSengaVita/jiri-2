<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactRow extends Component
{

    public Contact $contact;


    public function giveThisId($id): void
    {
        $this->dispatch('giveThisId', contactId: $id)->to(CreateContact::class);
    }

    public function render()
    {
        return view('livewire.contact-row');
    }
}
