<?php

namespace App\Livewire;

use App\Mail\SendToken;
use App\Models\Attendance;
use App\Models\Jiri;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class StartJiriButton extends Component
{

    public int $jiriId;

    public Collection $attendances;

    public function mount($jiriId)
    {
        $this->jiriId = $jiriId;

        $this->attendances = Attendance::where('jiri_id', $this->jiriId)
            ->where('role', 'evaluator')->get();
    }

    public function sendToken()
    {
        foreach ($this->attendances as $attendance){
            Mail::to($attendance->contact->email)->queue(new SendToken($attendance->token));
        }

//
//        foreach($this->attendances as $attendance) {
//            dump($attendance->contact->email);
//            if($attendance){
//                $message = (new SendToken($attendance->token));
//                Mail::to($attendance->contact->email)->queue($message);
//            }
//        }
//
//
//        $this->attendances->each(function ($attendance){
//            $message = (new SendToken($attendance->token));
//            Mail::to($attendance->contact->email)->queue
//            ($message);
//        });

    }

    public function render()
    {
        return view('livewire.start-jiri-button');
    }
}
