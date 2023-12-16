<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class ProjectList extends Component
{
    public bool $isCreateProjectModal;

    public User $user;

    public function mount($user)
    {
        $this->isCreateProjectModal = false;
        $this->user = $user;
    }

    public function editThisProject($projectId)
    {
        $this->isCreateProjectModal = true;
        $this->dispatch('editThisProject', projectId: $projectId)->to(createProject::class);
    }

    public function deleteThisProject($projectId)
    {
        $this->dispatch('deleteThisProject', projectId: $projectId)->to(createProject::class);
    }

    #[On('createProject')]
    public function createProject()
    {
        $this->isCreateProjectModal = true;
        $this->dispatch('createProject')->to(createProject::class);
    }

    #[On('saveTheProject')]
    #[On('deleteThisProject')]
    public function refreshTheComponent()
    {
        $this->isCreateProjectModal = false;
        $this->mount($this->user);
        $this->render();
    }

    public function render()
    {
        return view('livewire.project-list');
    }
}
