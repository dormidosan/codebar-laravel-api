<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Laboratorio>
 */
class LaboratorioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'distrito_id' => fake()->numberBetween(1, 10),
            'direccion' => fake()->address(),
            'nombre' => fake()->company(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
