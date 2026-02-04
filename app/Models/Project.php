<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category',
        'description',
        'is_published',
        'thumbnail',
        'readme_path',
    ];

    protected $casts = [
        'is_published' => 'boolean'
    ];

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }
}
