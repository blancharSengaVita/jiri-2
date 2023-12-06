<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateContact extends Component
{
    public int $contactId;

    #[Validate('required')]
    public string $firstname;

    #[Validate('required')]
    public string $surname;

    #[Validate('required')]
    public string $email;

    #[Validate('required')]
    public string $phoneNumber;

    public function mount($contactId = 0) :void
    {
        if ($contactId) {
            $contact = Auth::user()->contacts()->get();
            $this->contactId = $contact->id;

            $this->firstname = $contact->name;
            $this->surname = $contact->name;
            $this->email = $contact->email;
            $this->phoneNumber = $contact->phone;
        } else {
            $this->contactId = $contactId;
            $this->firstname = '';
            $this->surname = '';
            $this->email = '';
            $this->phoneNumber = '';
        }

    }

    public function render()
    {
        return view('livewire.create-contact');
    }
}
