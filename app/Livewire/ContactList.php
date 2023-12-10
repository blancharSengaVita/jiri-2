<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class ContactList extends Component
{
    public User $user;
    public bool $modal;

    public function mount($user)
    {
        $this->user = $user;
        $this->modal = true;
    }

    public function editThisContact($contactId)
    {
        $this->dispatch('editThisContact', contactId: $contactId)->to(createContact::class);
    }

    public function deleteThisContact($contactId)
    {
        $this->dispatch('deleteThisContact', contactId: $contactId)->to(createContact::class);
    }

    #[On('createContact')]
    public function createContact()
    {
        $this->dispatch('createContact')->to(createContact::class);
    }

    #[On('saveTheContact')]
    #[On('deleteThisContact')]
    public function refreshTheComponent()
    {
        $this->mount($this->user);
        $this->render();
    }

    public function render()
    {
        return view('livewire.contact-list');
    }
}
