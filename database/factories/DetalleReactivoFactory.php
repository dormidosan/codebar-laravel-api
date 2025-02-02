<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetalleReactivo>
 */
class DetalleReactivoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'reactivo_id' => $this->faker->numberBetween(1, 10),
            'codebar' => $this->faker->unique()->ean13(),
            'lote' => $this->faker->numberBetween(1, 10),
            'vencimiento' => $this->faker->date(),
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime(),
        ];
    }
}
