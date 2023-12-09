<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactRow extends Component
{

    public Contact $contact;

    public function giveThisId($id): void
    {
        $this->dispatch('giveThisId', id: $id);
    }

    public function render()
    {
        return view('livewire.contact-row');
    }
}
