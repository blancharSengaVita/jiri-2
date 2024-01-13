<?php

namespace App\Livewire;

use App\Models\Attendance;
use App\Models\Contact;
use App\Models\Duties;
use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Reactive;
use Livewire\Attributes\Url;
use Livewire\Component;

class AddProject extends Component
{
    public string $modal;

    #[Url]
    public string $search;

    #[Reactive]
    public int $jiriId;

    public Collection $projects;

    public function mount($modal): void
    {
        $this->search = '';
        $this->modal = $modal;
        $this->projects = new Collection();
    }

    #[Computed]
    public function filteredProjects(): Collection
    {
        return auth()
            ->user()
            ?->projects()
            ->where('name', 'like', '%' . $this->search . '%')
            ->whereDoesntHave('duties', function ($query) {
                $query->where('jiri_id', $this->jiriId);
            })
            ->get();
    }

    public function deleteFromJiri(Project $project)
    {
        Duties::where('jiri_id', $this->jiriId)
            ->where('project_id', $project->id)
            ->delete();
    }

    public function addToJiri(int $id): void
    {
        Duties::updateOrInsert([
            'jiri_id' => $this->jiriId,
            'project_id' => $id,
            'weighting' => null,
        ]);
        unset($this->addedTojury);
    }

    #[Computed]
    public function addedTojury()
    {
        return Project::whereHas('duties', function ($query) {
            $query->where('jiri_id', $this->jiriId);
        })
            ->get();
    }

    public function render()
    {
        return view('livewire.add-project');
    }
}
