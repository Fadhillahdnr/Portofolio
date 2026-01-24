<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectPublicController extends Controller
{
    public function index()
    {
        return view('public.portfolio', [
            'projects' => Project::published()->latest()->get()
        ]);
    }

    public function show(Project $project)
    {
        abort_if(!$project->is_published, 404);

        return view('public.projects.show', compact('project'));
    }
}
