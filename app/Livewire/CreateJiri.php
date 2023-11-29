<?php

namespace App\Livewire;

use App\Models\Jiri;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;

class CreateJiri extends Component
{
    //1. Savoir si le jury en question a un id ou pas
    //2.a S'il n'a pas de jury lui donner un id qui n'existe pas dans la db (genre 0 ou une valeur null)
    //3 faire un updaterOrCreate
    //


    //AJOUTER UN REQUIRE AU NOM AU MOINS
    public int $jiriId;
    public string $jiriName;
    public string $jiriDate;

    public function mount($jiriId = 0): void
    {
        if ($jiriId) {
            $jiri = Auth::user()->jiris()->get();
            $this->jiriId = $jiri->id;

            $this->jiriName = $jiri->name;
            $this->jiriDate = $jiri->starting_at;
        } else {
            $this->jiriId = $jiriId;
            $this->jiriName = '';
            $this->jiriDate = '';
        }
    }

    public function save(): void
    {
        $this->jiriId = Auth::user()->jiris()->updateOrCreate(['id' => $this->jiriId],
        [
            'name' => $this->jiriName,
            'starting_at' => $this->jiriDate,
        ])->id;
    }

        public function changeThisArray($array): void
    {
        $this->jiriId = Auth::user()->jiris()->updateOrCreate(['id' => $this->jiriId], $array)->id;
    }

    public function updatedJiriName(): void
    {
        $this->changeThisArray(['name' => $this->jiriName]);
    }

    public function updatingJiriDate(): void
    {
        $this->changeThisArray(['starting_at' => $this->jiriDate]);
    }

    #[Computed]
    public function thisJiriId(): int{
        return $this->jiriId;
    }

    public function render()
    {
        return view('livewire.create-jiri');
    }
}
