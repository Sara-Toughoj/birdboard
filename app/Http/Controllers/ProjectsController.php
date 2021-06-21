<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{

    public function store()
    {
        Project::create(request(['title', 'description']));
        return redirect('/projects');
    }

    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }
}
