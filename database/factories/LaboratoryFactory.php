<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Laboratorio>
 */
class LaboratoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'district_id' => fake()->numberBetween(1, 10),
            'address' => fake()->address(),
            'name' => fake()->company(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
