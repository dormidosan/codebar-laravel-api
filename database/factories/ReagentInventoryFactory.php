<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReagentInventoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'reagent_id' => $this->faker->numberBetween(1, 10),
            'barcode' => $this->faker->unique()->ean13(),
            'image' => $this->faker->imageUrl(),
            'lot' => $this->faker->numberBetween(1, 10),
            'expiration_date' => $this->faker->dateTimeBetween('now', '+1 years'),
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime(),
        ];
    }
}
