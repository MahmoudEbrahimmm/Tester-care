<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
         $name = $this->faker->unique()->words(2, true);

        return [
            'name'        => ucfirst($name),
            'slug'        => Str::slug($name),
            'category_id' => \App\Models\Category::inRandomOrder()->first()->id ?? 1,
            'image'       => $this->faker->imageUrl(200, 200, 'products', true),
            'description' => $this->faker->sentence(10),
            'price' => $this->faker->randomFloat(2, 50, 5000),
        ];
    }
}
