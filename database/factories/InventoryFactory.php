<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventory>
 */
class InventoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'item_name' => fake()->name(),
            'quantity' => fake()->numberBetween(1, 100),
            'stock' => fake()->numberBetween(1, 100),
            'unit' => fake()->word(),
            'price' => fake()->numberBetween(1, 100),
            'description' => fake()->sentence(),
            'expiry_date' => fake()->date(),
            'purchase_date' => fake()->date(),
        ];
    }
}
