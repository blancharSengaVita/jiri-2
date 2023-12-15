<?php

namespace App\Livewire;

use App\Models\Project;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
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
//        $this->linkInputs = new Collection();
        $this->fill([
            'linkInputs' => collect([['link' =>'']]),
        ]);
    }

    public function addLinkInput()
    {
        $this->linkInputs->push(['link' => '']);
    }

    public function removeLinkInput($key)
    {
        $this->linkInputs->pull($key);
    }

    protected $rules = [
        'linkInputs.*.link' => 'required',
    ];

    protected $messages = [
        'linkInputs.*.link.required' => 'This link field is required.',
    ];

    public function save(): void
    {
        $this->validate();
//        $encode = json_encode($this->linkInputs);
        $encode = $this->linkInputs;
        $i = 1;
            $tata = '';
        foreach ($this->linkInputs as $input){
            dd($input);
            $tata .= $input . $i;
           $i++;
           dd($tata);
        }

        $this->projectId = Auth::user()->projects()->updateOrCreate([
            'id' => $this->projectId
        ],
            [
                'name' => $this->name,
                'description' => $this->description,
                'link' => '{"pid": 101, "name": "name1"}',
            ])->id;
    }

    public function render()
    {
        return view('livewire.create-project');
    }
}
