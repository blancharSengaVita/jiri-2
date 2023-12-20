<?php

namespace App\Livewire;

use App\Models\Project;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateProject extends Component
{
    public int $projectId;

    #[Validate('required')]
    public string $name;

    #[Validate('required')]
    public string $description;

    public Collection $linkInputs;

    public function mount($projectId = 0): void
    {
        $this->createProject();
    }

    protected $rules = [
        'linkInputs.*' => 'required',
    ];

    protected $messages = [
        'linkInputs.*.required' => 'This link field is required.',
    ];

    public function addLinkInput()
    {
        $this->linkInputs->push('');
    }

    public function removeLinkInput($key)
    {
        $this->linkInputs->pull($key);
    }

    #[On('createProject')]
    public function createProject($projectId = 0)
    {
        $this->projectId = $projectId;
        $this->name = '';
        $this->description = '';
        $this->linkInputs = new Collection();
        $this->linkInputs->push('');
    }

    #[On('editThisProject')]
    public function openEditModal($projectId)
    {
        $project = Project::where('id', $projectId)->first();
        $this->projectId = $project->id;

        $this->name = $project->name;
        $this->description = $project->description;
        $this->linkInputs = collect(json_decode($project->link));
    }

    #[On('deleteThisProject')]
    public function deleteThisProject($projectId)
    {
        Project::where('id', $projectId)->delete();
        $this->dispatch('deleteThisProject')->to(ProjectList::class);
    }

    public function save(): void
    {
        $this->validate();

        Auth::user()->projects()->updateOrCreate([
            'id' => $this->projectId,
        ],
            [
                'name' => $this->name,
                'description' => $this->description,
                'link' => json_encode($this->linkInputs),
            ]);

        if (! $this->projectId) {
            $this->createProject();
        }

        $this->dispatch('saveTheProject')->to(ProjectList::class);
    }

    public function render()
    {
        return view('livewire.create-project');
    }
}
