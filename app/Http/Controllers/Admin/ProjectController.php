<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Models\ProjectImage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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
        ]);

        // generate slug unik
        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $counter = 1;

        while (Project::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }

        // upload thumbnail
        $thumbnailPath = $request->file('thumbnail')
            ->store('projects/thumbnails', 'public');

        $project = Project::create([
            'title' => $request->title,
            'slug' => $slug,
            'category' => $request->category,
            'description' => $request->description,
            'thumbnail' => $thumbnailPath,
            'is_published' => true,
        ]);

        // upload gallery images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('projects/gallery', 'public');

                ProjectImage::create([
                    'project_id' => $project->id,
                    'image' => $path,
                ]);
            }
        }

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project berhasil ditambahkan');
    }

    public function toggleStatus(Project $project)
    {
        // AMAN TANPA POLICY (sementara)
        $project->update([
            'is_published' => ! $project->is_published
        ]);

        return back()->with('success', 'Status project berhasil diperbarui');
    }
}
