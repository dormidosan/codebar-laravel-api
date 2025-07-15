<?php

namespace Database\Factories;

use App\Models\Reagent;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Reagent>
 */
class BarcodeTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
        ];
    }
}
