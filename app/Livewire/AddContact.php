<?php

namespace App\Livewire;

use App\Models\Attendance;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Reactive;
use Livewire\Attributes\Url;
use Livewire\Component;

class AddContact extends Component
{
    #[Url]
    public string $search;
    #[Reactive]
    public int $jiriId;
    #[Computed]
    public string $role;
    public string $modal;
    public Collection $contacts;

    public function mount($role, $modal): void
    {
        $this->role = $role;
        $this->search = '';
        $this->modal = $modal;
        $this->contacts = new Collection();
    }

    #[Computed]
    public function filteredContacts(): Collection
    {
        info($this->role);
        return Contact::where('name', 'like', '%' . $this->search . '%')
            ->where('user_id', Auth::user()->id)
            ->whereDoesntHave('attendances', function ($query) {
                $query->where('jiri_id', $this->jiriId);
            })
            ->get();
    }

    public function addToJiri(Contact $contact): void
    {
        Attendance::updateOrInsert([
            'jiri_id' => $this->jiriId,
            'contact_id' => $contact->id,
        ],
            [
                'role' => $this->role,
            ]);
    }

    public function deleteFromJiri(Contact $contact)
    {
        Attendance::where('jiri_id', '=', $this->jiriId)
            ->where('contact_id', '=', $contact->id)
            ->delete();
    }

    #[Computed]
    public function addedTojury()
    {
        return Contact::whereHas('attendances', function ($query) {
            $query->where('jiri_id', $this->jiriId)
                ->where('role', $this->role);
        })
            ->get();
    }


    public function render()
    {
        return view('livewire.add-contact');
    }
}
