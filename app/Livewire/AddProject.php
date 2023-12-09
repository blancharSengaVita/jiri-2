<?php

namespace App\Livewire;

use App\Models\Contact;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class AddProject extends Component
{

    public function render()
    {
        return view('livewire.add-project');
    }
}
