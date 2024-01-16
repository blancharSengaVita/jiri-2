<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Duties;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use function Laravel\Prompts\password;

class TokenController extends Controller
{
    public function store(Request $request)
    {

        if (Attendance::where('token', $request->token)->first()) {
            $evaluators = Attendance::where('token', $request->token)->first();
            $request->session()->regenerate();
            Auth::guard('attendances')->login($evaluators);

            return redirect('evaluators');
        }

        return back()->withErrors([
            'token' => 'Token incorrecte',
        ]);
    }

}

