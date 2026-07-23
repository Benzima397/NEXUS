<?php

namespace App\Http\Controllers;

class ProjectController extends Controller
{
    public function index()
    {
        return view('pages.projects');
    }

    public function show(string $slug)
    {
        $projects = collect(config('nexus.projects'));
        $project = $projects->firstWhere('slug', $slug);

        abort_unless($project, 404);

        return view('pages.project-detail', ['project' => $project]);
    }
}
