<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CategoryInstitution>
 */
class CategoryInstitutionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->titleMale . " " . rand(1, 5000) . "" . $this->faker->safeColorName,
            'description' => $this->faker->unique()->realText
        ];
    }
}
