<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LaboratoryReagentFactory extends Factory
{
    private static array $usedCombinations = [];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // The combination of reagent_inventory_id, laboratory_id should be unique,
        // so we need to ensure that the same combination is not used in the factory
        // or in the seeder.

        static $usedCombinations = [];

        do {
            $reagentInventoryId = $this->faker->numberBetween(1, 10);
            $laboratoryId = $this->faker->numberBetween(1, 10);
            $combination = $reagentInventoryId.'-'.$laboratoryId;
        } while (in_array($combination, self::$usedCombinations));

        self::$usedCombinations[] = $combination;

        return [
            'reagent_inventory_id' => $reagentInventoryId,
            'laboratory_id' => $laboratoryId,
            'user_id' => $this->faker->numberBetween(1, 10),
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime(),
        ];
    }
}
