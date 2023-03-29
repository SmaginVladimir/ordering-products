<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CategoryProductCard>
 */
class CategoryProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->titleFemale . "" . rand(1, 5000) . "" . $this->faker->colorName,
            'description' => $this->faker->unique()->realText,
            'image' => $this->faker->unique()->imageUrl
        ];
    }
}
