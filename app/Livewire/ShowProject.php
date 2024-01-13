<?php

namespace App\Livewire;

use App\Models\Duties;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class ShowProject extends Component
{
    #[Reactive]
    public int $jiriId;

//    #[Reactive]
//    public array $weightings;


    public function mount()
    {

    }

    #[computed]
    public function dutiesAddedToJiri()
    {
        $dutiesOfJiri = Duties::where('jiri_id', '=', $this->jiriId)
            ->get();

        return $dutiesOfJiri;
    }

    public function render()
    {
        return view('livewire.show-project');
    }
}
