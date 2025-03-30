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

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);
        //User departments seeder
        $this->call(DepartmentSeeder::class);
        $this->call(MunicipalitySeeder::class);
        $this->call(DistrictSeeder::class);

        User::factory(20)->create();
        Laboratory::factory(50)->create();

        //8 Equipos seeder
        $this->call(AnalyzerSeeder::class);

        $this->call(BarcodeTypeSeeder::class);
        $this->call(ReagentTypeSeeder::class);
        //Reagent::factory(50)->create();
        $this->call(ReagentSeeder::class);

        AnalyzerReagent::factory(50)->create();

//
        ReagentInventory::factory(50)->create();
//
        LaboratoryReagent::factory(50)->create();

    }
}
