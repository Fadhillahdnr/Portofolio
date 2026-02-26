<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
            'thumbnail'   => 'required|image|max:2048',
            'images'      => 'nullable|array',
            'images.*'    => 'image|max:2048',
            'captions'    => 'nullable|array',
            'captions.*'  => 'nullable|string|max:255',
        ]);

        /* ===== GENERATE SLUG ===== */
        $slug = $this->generateUniqueSlug($request->title);

        /* ===== UPLOAD THUMBNAIL ===== */
        $thumbnailUpload = cloudinary()->uploadApi()->upload(
            $request->file('thumbnail')->getRealPath(),
            [
                'folder' => 'portfolio/thumbnails'
            ]
        );

        /* ===== CREATE PROJECT ===== */
        $project = Project::create([
            'title'        => $request->title,
            'slug'         => $slug,
            'category'     => $request->category,
            'description'  => $request->description,
            'thumbnail'    => $thumbnailUpload['secure_url'],
            'thumbnail_id' => $thumbnailUpload['public_id'],
            'demo_url'     => $request->demo_url,
            'github_url'   => $request->github_url,
            'is_published' => true,
        ]);

        /* ===== UPLOAD GALLERY ===== */
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {

                $upload = cloudinary()->uploadApi()->upload(
                    $image->getRealPath(),
                    [
                        'folder' => 'portfolio/gallery'
                    ]
                );

                $project->images()->create([
                    'image'     => $upload['secure_url'],
                    'public_id' => $upload['public_id'],
                    'caption'   => $request->captions[$index] ?? null,
                ]);
            }
        }

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project berhasil ditambahkan');
    }

    /* =========================
     *  SHOW
     * ========================= */
    public function show(Project $project)
    {
        $project->load('images');

        return view('admin.projects.show', compact('project'));
    }

    /* =========================
     *  EDIT
     * ========================= */
    public function edit(Project $project)
    {
        $project->load('images');

        return view('admin.projects.edit', compact('project'));
    }

    /* =========================
     *  UPDATE
     * ========================= */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'category'    => 'required|string|max:100',
            'description' => 'required|string',
            'demo_url'    => 'nullable|url',
            'github_url'  => 'nullable|url',
            'thumbnail'   => 'nullable|image|max:2048',
        ]);

        /* ===== UPDATE SLUG IF TITLE CHANGED ===== */
        if ($project->title !== $request->title) {
            $project->slug = $this->generateUniqueSlug($request->title, $project->id);
        }

        $project->update([
            'title'       => $request->title,
            'category'    => $request->category,
            'description' => $request->description,
            'demo_url'    => $request->demo_url,
            'github_url'  => $request->github_url,
        ]);

        /* ===== UPDATE THUMBNAIL ===== */
        if ($request->hasFile('thumbnail')) {

            if ($project->thumbnail_id) {
                cloudinary()->uploadApi()->destroy($project->thumbnail_id);
            }

            $upload = cloudinary()->uploadApi()->upload(
                $request->file('thumbnail')->getRealPath(),
                [
                    'folder' => 'portfolio/thumbnails'
                ]
            );

            $project->update([
                'thumbnail'    => $upload['secure_url'],
                'thumbnail_id' => $upload['public_id'],
            ]);
        }

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project berhasil diperbarui');
    }

    /* =========================
     *  DELETE PROJECT
     * ========================= */
    public function destroy(Project $project)
    {
        /* DELETE THUMBNAIL */
        if ($project->thumbnail_id) {
            cloudinary()->uploadApi()->destroy($project->thumbnail_id);
        }

        /* DELETE GALLERY */
        foreach ($project->images as $image) {
            if ($image->public_id) {
                cloudinary()->uploadApi()->destroy($image->public_id);
            }
            $image->delete();
        }

        $project->delete();

        return back()->with('success', 'Project berhasil dihapus');
    }

    /* =========================
     *  HELPER SLUG
     * ========================= */
    private function generateUniqueSlug($title, $ignoreId = null)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $counter = 1;

        while (
            Project::where('slug', $slug)
                ->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $originalSlug . '-' . $counter++;
        }

        return $slug;
    }
}