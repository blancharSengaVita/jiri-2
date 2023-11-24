<?php

namespace App\Livewire;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;

class AddContact extends Component
{
    #[Url]
    public string $search;
    public Collection $contactsToAddToJiri;
    public string $id;

    public function mount(){
        $this->search = '';
        $this->contactsToAddToJiri = new Collection();
        $this->id = 1;
    }

    #[Computed]
    public function filteredContacts(): Collection
    {
        $contacts = Contact::where('name', 'like', '%' . $this->search . '%')
            ->get();

        return $contacts;
    }

    public function addContactToContactsToAddToJiri(Contact $contact)
    {
        if (!$this->contactsToAddToJiri->contains($contact)){
            $this->contactsToAddToJiri->put($contact->id,$contact);
        } else {
            $reducedContacts = $this->contactsToAddToJiri->filter(fn($c) => $contact->isNot($c));
            $this->contactsToAddToJiri = $reducedContacts;
        }
    }

    public function render()
    {
        return view('livewire.add-contact');
    }
}
