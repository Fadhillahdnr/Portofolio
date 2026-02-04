<?php

namespace Tests\Feature;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProjectReadmeTest extends TestCase
{
    use RefreshDatabase;

    public function test_readme_markdown_is_rendered_on_public_project_page(): void
    {
        Storage::fake('public');

        // Simulate a README markdown file
        $markdown = "# Hello World\n\nThis is **bold** text.";
        $path = 'projects/readme/test-readme.md';
        Storage::disk('public')->put($path, $markdown);

        // Create project and point readme_path to the stored file
        $project = Project::create([
            'title' => 'My Project',
            'slug' => 'my-project',
            'category' => 'Web',
            'description' => 'Desc',
            'thumbnail' => 'thumb.jpg',
            'is_published' => true,
            'readme_path' => $path,
        ]);

        $response = $this->get(route('projects.show', $project->slug));

        $response->assertOk();

        // The rendered HTML should include the converted markdown
        $response->assertSee('<h1', false);
        $response->assertSee('<strong>bold</strong>', false);
    }

    public function test_page_does_not_show_readme_section_when_none_exists(): void
    {
        $project = Project::create([
            'title' => 'No Readme',
            'slug' => 'no-readme',
            'category' => 'Other',
            'description' => 'Desc',
            'thumbnail' => 'thumb.jpg',
            'is_published' => true,
        ]);

        $response = $this->get(route('projects.show', $project->slug));

        $response->assertOk();
        $response->assertDontSee('Project Documentation');
    }
}
