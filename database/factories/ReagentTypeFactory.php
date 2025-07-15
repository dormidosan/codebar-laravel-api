<?php

namespace Database\Factories;

use App\Models\ReagentType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ReagentType>
 */
class ReagentTypeFactory extends Factory
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
