<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    protected $model = Category::class;
    
    public function definition(): array
    {
         $name = $this->faker->unique()->words(2, true);
        return [
            'name'        => ucfirst($name),
            'slug'        => Str::slug($name),
            'parent_id'   => null,
            'image'       => $this->faker->imageUrl(200, 200, 'categories', true),
            'description' => $this->faker->sentence(10),
        ];
    }
}
