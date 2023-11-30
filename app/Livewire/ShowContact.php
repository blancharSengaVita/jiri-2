<?php

namespace App\Livewire;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class ShowContact extends Component
{
    #[Reactive]
    public int $jiriId;
    public Collection $contacts;

    public function mount(){
        $this->contacts = new Collection();
    }

    #[computed]
    public function conctatAddedToJiri(){
        $this->contacts = new Collection();
        $attendancesOfJiri = DB::table('attendances')->where('jiri_id', '=', $this->jiriId)
            ->where('role', '=', 'student')
            ->get();

        foreach ($attendancesOfJiri as $attendance) {
            $this->contacts->push(DB::table('contacts')->where('id', '=', $attendance->contact_id)->first());
        }


        //pour chaque attendances qu'on a ajouté, je dois recuperer l'id du contact
        //et ensuite, je dois recupérer le contact grâce cette id.

        return $this->contacts;
    }

    public function render()
    {
        return view('livewire.show-contact', ['students' => $this->conctatAddedToJiri]);
    }
}