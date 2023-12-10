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


    public function mount($user)
    {
        $this->user = $user;
    }

    public function coontactId(){
        dd('je suis dans coontactID');
    }

//    #[computed]
//    public function thisIdIs($id = 0){
//        return $id;
//    }

    #[On('saveContactOnContactIndexPage')]
    public function render()
    {
        return view('livewire.contact-list');
    }
}
