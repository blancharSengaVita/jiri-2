<?php

namespace App\Livewire;

use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Reactive;
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

    public bool $isCreateContactModalOpen;

    public function mount(): void
    {
        $this->createContact();
        $this->isCreateContactModalOpen = true;
    }

    #[On('createContact')]
    public function createContact($contactId = 0)
    {
        $this->contactId = $contactId;
        $this->firstname = '';
        $this->surname = '';
        $this->email = '';
        $this->phoneNumber = '';
    }

    #[On('editThisContact')]
    public function openEditModal($contactId)
    {
        $contact = Contact::where('id', $contactId)->first();
        $this->contactId = $contact->id;

        $this->firstname = $contact->name;
        $this->surname = $contact->name;
        $this->email = $contact->email;
        $this->phoneNumber = $contact->phone;
    }

    #[On('deleteThisContact')]
    public function deleteThisContact($contactId)
    {
        Contact::where('id', $contactId)->delete();
        $this->dispatch('deleteThisContact')->to(ContactList::class);
    }

    #[computed]
    public function isCreateContactModalOpen()
    {
        return $this->isCreateContactModalOpen = false;
    }

    public function save(): void
    {
        $this->isCreateContactModalOpen();
        $this->validate();


        Auth::user()->contacts()->updateOrCreate([
            'id' => $this->contactId
        ],
            [
                'name' => $this->surname,
                'phone' => $this->phoneNumber,
                'email' => $this->email,
            ]);

        if (!$this->contactId) {
            $this->reset();
        }

        $this->dispatch('saveTheContact')->to(ContactList::class);
    }

    public function render()
    {
        return view('livewire.create-contact');
    }
}
