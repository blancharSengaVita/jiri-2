<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJiriRequest;
use App\Models\Jiri;
use Illuminate\Support\Facades\Auth;

class jiriController extends Controller
{
    public function create()
    {
        return view('jiri.create');
    }

    public function store(StoreJiriRequest $request)
    {
        Auth::user()->jiris()
            ->save(new Jiri((array) $request
            ));

        return to_route('jiri.create');
    }

    public function edit()
    {

    }

    public function update()
    {

    }
}
