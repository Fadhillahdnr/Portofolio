<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category',
        'description',
        'is_published',
        'thumbnail',
        'thumbnail_id',
        'readme_path',
        'demo_url',
        'github_url',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    /*
    |--------------------------------------------------------------------------
    | MODEL EVENTS
    |--------------------------------------------------------------------------
    */

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($project) {
            if (empty($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
        });
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeWithDemo($query)
    {
        return $query->whereNotNull('demo_url');
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIPS
    |--------------------------------------------------------------------------
    */

    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }

    /*
    |--------------------------------------------------------------------------
    | HELPERS
    |--------------------------------------------------------------------------
    */

    public function hasDemo()
    {
        return !empty($this->demo_url);
    }

    public function hasGithub()
    {
        return !empty($this->github_url);
    }

    public function hasReadme()
    {
        if (!$this->readme_path) {
            return false;
        }

        return \Illuminate\Support\Facades\Storage::disk('public')->exists($this->readme_path);
    }

    public function getReadmeUrl()
    {
        if (!$this->hasReadme()) {
            return null;
        }

        return asset('storage/' . $this->readme_path);
    }
}