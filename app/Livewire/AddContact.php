<?php

namespace App\Livewire;

use App\Models\Attendance;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;

class AddContact extends Component
{
    #[Url]
    public string $search;
    public Collection $contactsToAddToJiri;
    public string $id;
    public int $jiriId;

    public function mount($thisJiriId){
        $this->search = '';
        $this->contactsToAddToJiri = new Collection();
        $this->id = 1;
        $this->jiriId = $thisJiriId;
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

    public function save(){
        foreach ($this->contactsToAddToJiri as $contact){

            DB::table('attendances')->insert([
                'role' => 'student',
                'contact_id' => $contact->id,
                'jiri_id' => 1,
            ]);
//            lié le $contact au jury qu'on est en train de créer
        }
    }

    public function render()
    {
        return view('livewire.add-contact');
    }
}
