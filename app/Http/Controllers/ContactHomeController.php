<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:attendance');
    }
    public function index()
    {
        return view('evaluator.index');
    }
}
