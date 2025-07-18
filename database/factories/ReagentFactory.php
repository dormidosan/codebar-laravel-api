<?php

namespace Database\Factories;

use App\Models\Reagent;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Reagent>
 */
class ReagentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'reagent_type_id' => $this->faker->numberBetween(1, 10), // Assuming you have 10 ReagentType records
            'code' => $this->faker->unique()->randomNumber(5),
            'name' => $this->faker->name(),
            'volume' => $this->faker->randomFloat(2, 0, 100),
        ];
    }
}
