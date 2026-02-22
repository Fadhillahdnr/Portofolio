<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\CommonMarkConverter;

class ProjectController extends Controller
{
    /* =========================
     *  INDEX
     * ========================= */
    public function index(Request $request)
    {
        $query = Project::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $projects = $query->latest()->get();

        return view('admin.projects.index', compact('projects'));
    }

    /* =========================
     *  CREATE
     * ========================= */
    public function create()
    {
        return view('admin.projects.create');
    }

    /* =========================
     *  STORE
     * ========================= */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'category'    => 'required|string|max:100',
            'description' => 'required|string',

            'demo_url'    => 'nullable|url',
            'github_url'  => 'nullable|url',

            'thumbnail'   => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',

            'images'      => 'nullable|array',
            'images.*'    => 'image|mimes:jpg,jpeg,png,webp|max:2048',

            'captions'    => 'nullable|array',
            'captions.*'  => 'nullable|string|max:255',

            'readme'      => 'nullable|file|mimes:md,txt|max:2048',
        ]);

        /* ===== SLUG UNIK ===== */
        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $counter = 1;

        while (Project::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }

        /* ===== UPLOAD THUMBNAIL ===== */
        $thumbnailPath = $request->file('thumbnail')
            ->store('projects/thumbnails', 'public');

        /* ===== UPLOAD README ===== */
        $readmePath = $request->hasFile('readme')
            ? $request->file('readme')->store('projects/readme', 'public')
            : null;

        /* ===== CREATE PROJECT ===== */
        $project = Project::create([
            'title'        => $request->title,
            'slug'         => $slug,
            'category'     => $request->category,
            'description'  => $request->description,
            'thumbnail'    => $thumbnailPath,
            'readme_path'  => $readmePath,
            'demo_url'     => $request->demo_url,
            'github_url'   => $request->github_url,
            'is_published' => true,
        ]);

        /* ===== GALLERY ===== */
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                ProjectImage::create([
                    'project_id' => $project->id,
                    'image'      => $image->store('projects/gallery', 'public'),
                    'caption'    => $request->captions[$index] ?? null,
                ]);
            }
        }

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project berhasil ditambahkan');
    }

    /* =========================
     *  TOGGLE STATUS
     * ========================= */
    public function toggleStatus(Project $project)
    {
        $project->update([
            'is_published' => ! $project->is_published
        ]);

        return back()->with('success', 'Status project berhasil diperbarui');
    }

    /* =========================
     *  SHOW (PUBLIC VIEW)
     * ========================= */
    public function show(Project $project)
    {
        $readmeHtml = null;

        if (
            $project->readme_path &&
            Storage::disk('public')->exists($project->readme_path)
        ) {
            $markdown = Storage::disk('public')->get($project->readme_path);

            $converter = new CommonMarkConverter([
                'html_input' => 'strip',
                'allow_unsafe_links' => false,
            ]);

            $readmeHtml = $converter
                ->convert($markdown)
                ->getContent();
        }

        return view('public.projects.show', compact('project', 'readmeHtml'));
    }

    /* =========================
     *  EDIT
     * ========================= */
    public function edit($id)
    {
        $project = Project::findOrFail($id);

        return view('admin.projects.edit', compact('project'));
    }

    /* =========================
     *  UPDATE
     * ========================= */
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'category'    => 'required|string',
            'description' => 'required|string',

            'demo_url'    => 'nullable|url',
            'github_url'  => 'nullable|url',

            'thumbnail'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'readme'      => 'nullable|mimes:md,txt|max:2048',
        ]);

        /* ===== UPDATE SLUG JIKA TITLE BERUBAH ===== */
        if ($project->title !== $validated['title']) {
            $slug = Str::slug($validated['title']);
            $originalSlug = $slug;
            $counter = 1;

            while (
                Project::where('slug', $slug)
                    ->where('id', '!=', $project->id)
                    ->exists()
            ) {
                $slug = $originalSlug . '-' . $counter++;
            }

            $project->slug = $slug;
        }

        /* ===== UPDATE DATA ===== */
        $project->title = $validated['title'];
        $project->category = $validated['category'];
        $project->description = $validated['description'];
        $project->demo_url = $validated['demo_url'] ?? null;
        $project->github_url = $validated['github_url'] ?? null;

        /* ===== UPDATE THUMBNAIL ===== */
        if ($request->hasFile('thumbnail')) {

            if ($project->thumbnail &&
                Storage::disk('public')->exists($project->thumbnail)) {
                Storage::disk('public')->delete($project->thumbnail);
            }

            $project->thumbnail = $request->file('thumbnail')
                ->store('projects/thumbnails', 'public');
        }

        /* ===== UPDATE README ===== */
        if ($request->hasFile('readme')) {

            if ($project->readme_path &&
                Storage::disk('public')->exists($project->readme_path)) {
                Storage::disk('public')->delete($project->readme_path);
            }

            $project->readme_path = $request->file('readme')
                ->store('projects/readme', 'public');
        }

        $project->save();

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project berhasil diperbarui');
    }
}