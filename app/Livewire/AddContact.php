<?php

namespace App\Livewire;

use App\Models\Attendance;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Reactive;
use Livewire\Attributes\Url;
use Livewire\Component;

class AddContact extends Component
{
    #[Url]
    public string $search;
    public Collection $contactsToAddToJiri;
    #[Reactive]
    public int $jiriId;

    public function mount(): void
    {
        $this->search = '';
        $this->contactsToAddToJiri = new Collection();
    }

    #[Computed]
    public function filteredContacts(): Collection
    {
        $contacts = Contact::where('name', 'like', '%' . $this->search . '%')
            ->get();

        return $contacts;
    }

    public function addContactToContactsToAddToJiri(Contact $contact): void
    {
        if (!$this->contactsToAddToJiri->contains($contact)) {
            $this->contactsToAddToJiri->put($contact->id, $contact);

            DB::table('attendances')->updateOrInsert([
                'jiri_id' => $this->jiriId,
                'contact_id' => $contact->id
            ],
                [
                    'role' => 'student'
                ]);

        } else {
            $reducedContacts = $this->contactsToAddToJiri->filter(fn($c) => $contact->isNot($c));
            $this->contactsToAddToJiri = $reducedContacts;

            DB::table('attendances')
                ->where('jiri_id', '=', $this->jiriId)
                ->where('contact_id', '=', $contact->id)
                ->delete();
        }
    }


    public function save()
    {
        foreach ($this->contactsToAddToJiri as $contact) {
            //j'ai une erreur avec cette methode c'est bien parce que
//            Auth::user()->attendances()->updateOrCreate([
//                'jiri_id' => $this->jiriId,
//                'contact_id' => $contact->id
//            ],
//                [
//                    'role' => 'student'
//                ]);

            DB::table('attendances')->updateOrInsert([
                'jiri_id' => $this->jiriId,
                'contact_id' => $contact->id
            ],
                [
                    'role' => 'student'
                ]);
        }
    }


    public function render()
    {
        return view('livewire.add-contact');
    }
}
