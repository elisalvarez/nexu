<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Brands;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ModelsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word,
            'sku' => $this->faker->unique()->numberBetween(1, 3000),
            'average_price' => $this->faker->numberBetween(100000, 400000),
            'brand_id' => Brands::factory()
        ];
    }
}
