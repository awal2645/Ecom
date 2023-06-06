<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaggableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::get();
        $blogs = Blog::get();
        foreach($products as $product ){
            $tag= Tag::get()->random();
            $product->tags()->save($tag);
        }
        foreach($blogs as $blog ){
            $tag= Tag::get()->random();
            $blog->tags()->save($tag);
        }
    }
}
