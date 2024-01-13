<?php

namespace App\Livewire;

use App\Models\Duties;
use App\Models\Jiri;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateJiri extends Component
{
    //1. Savoir si le jury en question a un id ou pas
    //2.a S'il n'a pas de jury lui donner un id qui n'existe pas dans la db (genre 0 ou une valeur null)
    //3 faire un updaterOrCreate
    //

    //AJOUTER UN REQUIRE AU NOM AU MOINS
    public int $jiriId;

    #[Validate('required|min:3', message: 'Yo, add a title')]
    public string $jiriName;

    public string $jiriDate;
    public array $weightings;

    public function mount($jiriId = 0, $weightings = []): void
    {
        $this->weightings = $weightings;

        if ($jiriId) {
            $jiri = Jiri::where('id', $jiriId)->first();
            $this->jiriId = $jiri->id;

            $this->jiriName = $jiri->name;
            $this->jiriDate = $jiri->starting_at;

            $duties = Duties::where('jiri_id', $this->jiriId)
                ->get();

            foreach ($duties as $duty){
                $this->weightings[$duty->id] = $duty->weighting;
            }

        } else {
            $this->jiriId = $jiriId;
            $this->jiriName = '';
            $this->jiriDate = '';
        }
    }

    public function save(): void
    {
        $this->validate();
        $this->jiriId = Auth::user()->jiris()->updateOrCreate(['id' => $this->jiriId],
            [
                'name' => $this->jiriName,
                'starting_at' => $this->jiriDate,
            ])->id;

        foreach ($this->weightings as $key => $weighting){
            Duties::updateOrCreate(
                ['id' => $key],
                ['weighting' => $weighting],
            );
        }
    }

    public function render()
    {
        return view('livewire.create-jiri');
    }
}
