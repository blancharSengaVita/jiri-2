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

    #[On('giveThisId')]
    public function mount($contactId = 0) :void
    {
        if ($contactId) {
            $contact = Contact::where('id', $contactId)->first();
            $this->contactId = $contact->id ;

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

//    #[On('giveThisId')]
//    public function contactId($id){
//        $contact = Contact::where('id', $id)->first();
//        $this->contactId = $contact->id;
//
//        $this->firstname = $contact->name;
//        $this->surname = $contact->name;
//        $this->email = $contact->email;
//        $this->phoneNumber = $contact->phone;
//    }

    public function saveContactOnContactIndexPage(): void
    {
        $this->dispatch('saveContactOnContactIndexPage');
    }

    public function save(): void
    {
        $this->validate();

        $this->contactId = Auth::user()->contacts()->updateOrCreate([
                'id' => $this->contactId
            ],
            [
                'name' => $this->surname,
                'phone' => $this->phoneNumber,
                'email' => $this->email,
            ])->id;

        $this->reset();
        $this->contactId = 0;
    }

    public function render()
    {
        return view('livewire.create-contact');
    }
}
