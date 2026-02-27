<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
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
            'thumbnail'   => 'required|image|max:2048',
            'images'      => 'nullable|array',
            'images.*'    => 'image|max:2048',
            'captions'    => 'nullable|array',
            'captions.*'  => 'nullable|string|max:255',
            'readme'      => 'nullable|file|mimes:md,txt|max:2048',
        ]);

        DB::beginTransaction();

        try {

            /* ===== GENERATE SLUG ===== */
            $slug = $this->generateUniqueSlug($request->title);

            /* ===== UPLOAD THUMBNAIL ===== */
            $thumbnailUpload = cloudinary()->uploadApi()->upload(
                $request->file('thumbnail')->getRealPath(),
                [
                    'folder' => 'portfolio/thumbnails'
                ]
            );

            /* ===== UPLOAD README (LOCAL STORAGE) ===== */
            $readmePath = null;

            if ($request->hasFile('readme')) {
                $readmePath = $request->file('readme')
                    ->store('readmes', 'public');
            }

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
                'readme_path'  => $readmePath,
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

            DB::commit();

            return redirect()
                ->route('admin.projects.index')
                ->with('success', 'Project berhasil ditambahkan');

        } catch (\Exception $e) {

            DB::rollBack();

            return back()->withErrors('Upload gagal: ' . $e->getMessage());
        }
    }

    /* =========================
     *  SHOW
     * ========================= */
    public function show(Project $project)
    {
        $project->load('images');

        $readmeHtml = null;
        $readmeExists = false;

        if ($project->readme_path && Storage::disk('public')->exists($project->readme_path)) {

            $readmeExists = true;

            $markdown = Storage::disk('public')->get($project->readme_path);

            $converter = new CommonMarkConverter([
                'html_input' => 'strip',
                'allow_unsafe_links' => false,
            ]);

            $readmeHtml = $converter->convert($markdown)->getContent();
        }

        return view('admin.projects.show', compact(
            'project',
            'readmeHtml',
            'readmeExists'
        ));
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
            'readme'      => 'nullable|file|mimes:md,txt|max:2048',
        ]);

        DB::beginTransaction();

        try {

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

                // Delete old thumbnail
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

            /* ===== UPDATE README ===== */
            if ($request->hasFile('readme')) {

                // Delete old readme file if exists
                if ($project->readme_path && Storage::disk('public')->exists($project->readme_path)) {
                    Storage::disk('public')->delete($project->readme_path);
                }

                $readmePath = $request->file('readme')
                    ->store('readmes', 'public');

                $project->update([
                    'readme_path' => $readmePath,
                ]);
            }

            DB::commit();

            return redirect()
                ->route('admin.projects.index')
                ->with('success', 'Project berhasil diperbarui');
        } catch (\Exception $e) {

            DB::rollBack();

            return back()->withErrors('Update gagal: ' . $e->getMessage());
        }
    }

    /* =========================
     *  DELETE PROJECT
     * ========================= */
    public function destroy(Project $project)
    {
        DB::beginTransaction();

        try {

            /* DELETE THUMBNAIL */
            if ($project->thumbnail_id) {
                cloudinary()->uploadApi()->destroy($project->thumbnail_id);
            }

            /* DELETE README FILE */
            if ($project->readme_path && Storage::disk('public')->exists($project->readme_path)) {
                Storage::disk('public')->delete($project->readme_path);
            }

            /* DELETE GALLERY */
            foreach ($project->images as $image) {
                if ($image->public_id) {
                    cloudinary()->uploadApi()->destroy($image->public_id);
                }
                $image->delete();
            }

            $project->delete();

            DB::commit();

            return back()->with('success', 'Project berhasil dihapus');
        } catch (\Exception $e) {

            DB::rollBack();

            return back()->withErrors('Gagal menghapus: ' . $e->getMessage());
        }
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