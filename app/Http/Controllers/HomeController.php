<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $projects = Project::latest();

        $projects = $projects->get();

        return view('home', compact('projects'));
    }

    public function project(Project $project)
    {
        return view('project.project_deteils', compact('project'));
    }
}
