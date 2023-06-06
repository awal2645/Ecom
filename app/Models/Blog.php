<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $guards = [];
    
    public function tags()
    {
        return $this->morphToMany(Tag::class, "taggable");
    }
    public function category()
    {
        return $this->belongsTo(BlogCategory::class, "categories_id");
    }
    public function tag()
    {
        return $this->belongsTo(Tag::class, "tag_id");
    }
}
