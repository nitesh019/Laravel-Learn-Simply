<?php

namespace Database\Factories;

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
        return [
            //
                'brand_id'=>\App\Models\Brand::factory()->create()->id,
                'name'=>fake()->word(),
                'price'=>fake()->numberBetween($min = 1500, $max = 6000)
            ];
    }
}
