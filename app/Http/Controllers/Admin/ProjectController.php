<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        return view('admin.projects.index', [
            'projects' => Project::latest()->get()
        ]);
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'description' => 'required|string',

            'thumbnail' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',

            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',

            'captions' => 'nullable|array',
            'captions.*' => 'nullable|string|max:255',

            'readme' => 'nullable|file|mimes:md,txt|max:2048',
        ]);

        // slug unik
        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $counter = 1;

        while (Project::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }

        // thumbnail
        $thumbnailPath = $request->file('thumbnail')
            ->store('projects/thumbnails', 'public');

        // readme
        $readmePath = $request->hasFile('readme')
            ? $request->file('readme')->store('projects/readme', 'public')
            : null;

        $project = Project::create([
            'title' => $request->title,
            'slug' => $slug,
            'category' => $request->category,
            'description' => $request->description,
            'thumbnail' => $thumbnailPath,
            'readme_path' => $readmePath,
            'is_published' => true,
        ]);

        // gallery + caption
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                ProjectImage::create([
                    'project_id' => $project->id,
                    'image' => $image->store('projects/gallery', 'public'),
                    'caption' => $request->captions[$index] ?? null,
                ]);
            }
        }

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project berhasil ditambahkan');
    }

    public function toggleStatus(Project $project)
    {
        $project->update([
            'is_published' => ! $project->is_published
        ]);

        return back()->with('success', 'Status project berhasil diperbarui');
    }
}
