<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJiriRequest;
use App\Models\Jiri;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class jiriController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $user->load('jiris');
        return view('jiri.index', compact('user'));
    }

    public function create()
    {
        return view('jiri.create');
    }

    public function show(Jiri $jiri)
    {
        return view('jiri.show', compact('jiri'));
    }


    public function destroy(Jiri $jiri)
    {
        if (!Gate::allows('handle-note', $jiri)) {
            abort(403);
        }
        $jiri->delete();
        return redirect('/jiries');
    }
}
