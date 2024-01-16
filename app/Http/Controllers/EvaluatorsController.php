<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EvaluatorsController extends Controller
{
    public function index (){

        return view('evaluator.index');
    }
}
