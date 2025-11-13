<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\BlogPostStatus;

class Blog extends Model
{
    protected $guarded = [];

    protected $casts = [
        'status' => BlogPostStatus::class,
    ];

    public function getImageUrlAttribute()
    {
        return $this->image ? asset('images/' . $this->image) : asset('images/default-post.jpg');
    }

    public function getTagsArrayAttribute()
    {
        // If tags is a comma-separated string like "Laravel, PHP, Web"
        if (empty($this->tags)) {
            return [];
        }
        
        return array_map('trim', explode(',', $this->tags));
    }
    public function getCategoriesArrayAttribute()
    {
        // If tags is a comma-separated string like "Laravel, PHP, Web"
        if (empty($this->category)) {
            return [];
        }
        
        return array_map('trim', explode(',', $this->category));
    }
}
