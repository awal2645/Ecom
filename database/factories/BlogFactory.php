<?php

namespace Database\Factories;

use App\Models\BlogCategory;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $category_id = BlogCategory::all()->random();
        $status = 1;

        return [
            "name" => fake()->name(), 
            "head_line" => fake()->text($maxNbChars = 80),
            "description" => fake()->text($maxNbChars = 200),
            "details" => fake()->text($maxNbChars = 500),
            "slug" => fake()->slug(),
            "status" => $status,
            "categories_id" => $category_id->id,
            "image" =>  fake()->imageUrl($width = 640, $height = 480),
        ];
    }
}
