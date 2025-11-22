<?php

namespace Database\Factories;

use App\Models\AnalyzerReagent;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<AnalyzerReagent>
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
