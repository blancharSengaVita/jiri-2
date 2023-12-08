<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Jiri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ContactController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $user->load('contacts');
        return view('contact.index', compact('user'));
    }

    public function create()
    {
        return view('contact.create');
    }

    public function show(Contact $contact)
    {
        return view('contact.show', compact('contact'));
    }


    public function destroy(Contact $contact)
    {
        if (!Gate::allows('handle-contact', $contact)) {
            abort(403);
        }
        $contact->delete();
        return redirect('/contacts');
    }
}
