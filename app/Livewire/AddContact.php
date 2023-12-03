<?php

namespace App\Livewire;

use App\Models\Attendance;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Builder;
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

    public string $role;

    public string $modal;

    public function mount($role, $modal): void
    {
        $this->role = $role;
        $this->search = '';
        $this->contactsToAddToJiri = new Collection();
        $this->modal = $modal;
    }

    #[Computed]
    public function filteredContacts(): Collection
    {

        $contacts = Contact::
        where('name', 'like', '%' . $this->search . '%')
            ->where('user_id', '=', Auth::user()->id)
            ->get();

//        $contactsNotAvailable = Attendance::where('jiri_id', '=', $this->jiriId);
//            ->where(cont)
//            ->get();

        //Je voudrais faire une query ou je demande de ne pas prendre les lignes avec un id qui se trouvent en tant que clé étrangers sur une autre table

        Contact::where('name', 'like', '%'.$this->seach.'%')
            ->where('user_id', Auth::user()->id)
            ->whereDoesntHave('attendances')
            ->get();

        return $contacts;
    }

    public function addContactToContactsToAddToJiri(Contact $contact): void
    {
        if (!$this->contactsToAddToJiri->contains($contact)) {
            $this->contactsToAddToJiri->put($contact->id, $contact);

            Attendance::updateOrInsert([
                'jiri_id' => $this->jiriId,
                'contact_id' => $contact->id,
            ],
                [
                    'role' => $this->role,
                ]);

        } else {
            $reducedContacts = $this->contactsToAddToJiri->filter(fn($c) => $contact->isNot($c));
            $this->contactsToAddToJiri = $reducedContacts;

            Attendance::where('jiri_id', '=', $this->jiriId)
                ->where('contact_id', '=', $contact->id)
                ->delete();
        }
    }

    public function save()
    {
        foreach ($this->contactsToAddToJiri as $contact) {
            DB::table('attendances')->updateOrInsert([
                'jiri_id' => $this->jiriId,
                'contact_id' => $contact->id,
            ],
                [
                    'role' => $this->role,
                ]);
        }
    }

    public function render()
    {
        return view('livewire.add-contact',
            [
                'modal' => $this->modal,
            ]);
    }
}
