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
    public bool $isCreateContactModal;

    public function mount($user)
    {
        $this->isCreateContactModal = false;
        $this->user = $user;
        $this->modal = true;
    }

    public function editThisContact($contactId)
    {
        $this->isCreateContactModal = true;
        $this->dispatch('editThisContact', contactId: $contactId)->to(createContact::class);
    }

    public function deleteThisContact($contactId)
    {
        $this->dispatch('deleteThisContact', contactId: $contactId)->to(createContact::class);
    }

    #[On('createContact')]
    public function createContact()
    {
        $this->isCreateContactModal = true;
        $this->dispatch('createContact')->to(createContact::class);
    }

    #[On('saveTheContact')]
    #[On('deleteThisContact')]
    public function refreshTheComponent()
    {
        $this->isCreateContactModal = false;
        $this->mount($this->user);
        $this->render();
    }

    public function render()
    {
        return view('livewire.contact-list');
    }
}
