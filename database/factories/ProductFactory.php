<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $category_id = Category::all()->random();
        $brand_id = Brand::all()->random();
        $status = 1;
        $shiping_time= 'within 72 hours shipping.';
        $stock = 'In Stock';

        return [
            "name" => fake()->name(),
            "details" => fake()->text($maxNbChars = 200),
            "availability" => $stock,
            "price" => fake()->numberBetween($min = 100, $max = 1000),
            "thumbnail_image" => fake()->imageUrl($width = 200, $height = 200),
            "slug" => fake()->slug(),
            "unit" => fake()->randomDigit(),
            "status" => $status,
            "category_id" => $category_id->id,
            "brand_id" => $brand_id->id,
            "description" => fake()->text($maxNbChars = 1000),
            "shipping_time" => $shiping_time,

        ];
    }
}
