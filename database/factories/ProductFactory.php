<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductCard>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' =>  $this->faker->sentence(3),
            'image' => $this->faker->unique()->imageUrl,
            'description' => $this->faker->unique()->realTextBetween,
            'price' => $this->faker->randomFloat(0,250,4500)
        ];
    }
}
