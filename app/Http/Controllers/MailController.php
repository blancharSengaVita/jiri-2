<?php

namespace App\Http\Controllers;

use App\Mail\SendToken;
use App\Models\Attendance;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{

    public ?int $jiriId;
    public Collection $attendances;

    public function __construct()
    {
        $this->jiriId = null;

        $this->attendances = Attendance::where('jiri_id', $this->jiriId)
            ->where('role', 'evaluator')->get();
    }

    public function index(Request $request){
        return view('welcome');
    }

    public function store(Request $request)
    {
        $this->jiriId = $request->jiriId;

        $this->attendances = Attendance::where('jiri_id', $this->jiriId)
            ->where('role', 'evaluator')->get();

        foreach ($this->attendances as $attendance) {
            Mail::to($attendance->contact->email)
                ->queue(new SendToken($attendance->token));
        }

        return redirect('/jiries');
    }
}
