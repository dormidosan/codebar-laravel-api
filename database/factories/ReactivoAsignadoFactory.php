<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReactivoAsignado>
 */
class ReactivoAsignadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'detalle_reactivo_id' => $this->faker->numberBetween(1, 10),
            'usuario_id' => $this->faker->numberBetween(1, 10),
            'laboratorio_id' => $this->faker->numberBetween(1, 10),
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime(),
        ];
    }
}
