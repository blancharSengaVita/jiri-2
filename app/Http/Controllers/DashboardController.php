<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
//    public ?int $jiriId;

    public function __construct(Request $request)
    {
//        dd(Auth::user());
//        dd('je suis dans le daschboardController');
//        $this->jiriId = $request->jiriId;

    }

    public function index(){
//        dd('yo');
//        $jiriId = session('jiriId');
//        $contacts = session('contacts');
//        return view('dashboard', compact('jiriId', 'contacts'));
        return view('dashboard');
    }


    public function store(){
        $jiriId = $this->jiriId;
        session(['jiriId' => $jiriId]);

        $contacts = Auth::user()->attendances->where('jiri_id', '=', $jiriId)
            ->where('role', '=', 'student');
        session(['contacts' => $contacts]);


        return view('dashboard', compact('jiriId', 'contacts'));
    }
}
