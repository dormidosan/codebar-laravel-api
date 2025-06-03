<?php

namespace Database\Seeders;

use App\Models\AnalyzerReagent;
use App\Models\Laboratory;
use App\Models\LaboratoryReagent;
use App\Models\ReagentInventory;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //User departments seeder
        $this->call(DepartmentSeeder::class);
        $this->call(MunicipalitySeeder::class);
        $this->call(DistrictSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(LaboratorySeeder::class);

        $this->call(BarcodeTypeSeeder::class);
        $this->call(ReagentTypeSeeder::class);
        $this->call(AnalyzerSeeder::class);
        $this->call(ReagentSeeder::class);

        // Only run dev seeders in local environment
        if (app()->environment('local')) {
            User::factory(20)->create();
            Laboratory::factory(50)->create();

            //Reagent::factory(50)->create();

            AnalyzerReagent::factory(50)->create();
//
            ReagentInventory::factory(50)->create();
//
            LaboratoryReagent::factory(50)->create();
        }
    }
}
