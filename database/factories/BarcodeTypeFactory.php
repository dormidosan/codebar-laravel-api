<?php

namespace Database\Factories;

use App\Models\BarcodeType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<BarcodeType>
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
