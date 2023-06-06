<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "details",
        "availability",
        "shipping_time",
        "weight",
        "thumbnail_image",
        "slug",
        "disscount",
        "price",
        "category_id",
        "featured_product",
        "status",
        "unit",
        "brand_id",
    ];
    // category relations
    public function category()
    {
        return $this->belongsTo(Category::class, "category_id");
    }

    // brand relations
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
