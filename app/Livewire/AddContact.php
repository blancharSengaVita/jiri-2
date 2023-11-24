<?php

namespace App\Livewire;

use Livewire\Component;

class AddContact extends Component
{
    public string $search;

    public function mount(){
        $this->search = '';
    }

    public function render()
    {
        return view('livewire.add-contact');
    }
}
