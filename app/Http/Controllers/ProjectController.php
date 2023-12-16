<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ProjectController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $user->load('projects');

        return view('project.index', compact('user'));
    }

    public function create()
    {
        return view('project.create');
    }

    public function show(Project $project)
    {
        return view('project.show', compact('project'));
    }

    public function destroy(Project $project)
    {
        if (! Gate::allows('handle-project', $project)) {
            abort(403);
        }
        $project->delete();

        return redirect('/projects');
    }
}
