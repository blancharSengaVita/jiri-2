<?php

namespace App\Livewire;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateProject extends Component
{
    public int $projectId;

    #[Validate('required')]
    public string $name;

    #[Validate('required')]
    public string $description;

    public function mount($projectId = 0) :void
    {
        if ($projectId) {
            $project = Project::where('id', $projectId)->first();
            $this->projectId = $project->id ;

            $this->name = $project->name;
            $this->description = $project->description;
        } else {
            $this->projectId = $projectId;
            $this->name = '';
            $this->description = '';
        }
    }

    public function save(): void
    {
        $this->validate();

        $this->projectId = Auth::user()->projects()->updateOrCreate([
            'id' => $this->projectId
        ],
            [
                'name' => $this->name,
                'description' => $this->description,
            ])->id;

    }

    public function render()
    {
        return view('livewire.create-project');
    }
}
