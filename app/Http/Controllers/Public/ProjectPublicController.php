<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\CommonMarkConverter;

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

        $readmeHtml = null;

        if ($project->readme_path && Storage::disk('public')->exists($project->readme_path)) {
            $markdown = Storage::disk('public')->get($project->readme_path);

            $converter = new CommonMarkConverter([
                'html_input' => 'strip',
                'allow_unsafe_links' => false,
            ]);

            $readmeHtml = $converter->convert($markdown)->getContent();
        }

        return view('public.projects.show', compact('project', 'readmeHtml'));
    }
}
