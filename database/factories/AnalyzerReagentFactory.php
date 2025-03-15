<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EquipoReactivo>
 */
class AnalyzerReagentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'analyzer_id' => $this->faker->numberBetween(1, 9),
            'reagent_id' => $this->faker->numberBetween(1, 32),
        ];
    }
}
