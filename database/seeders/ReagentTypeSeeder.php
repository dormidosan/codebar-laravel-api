<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReagentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reagents = [
            ['id' => 1, 'name' => 'Lisante'],
            ['id' => 2, 'name' => 'Diluyente'],
            ['id' => 3, 'name' => 'Colorante'],
            ['id' => 4, 'name' => 'Limpiador'],
            ['id' => 5, 'name' => 'Rinse'],
            ['id' => 6, 'name' => 'Solución de recubrimiento'],
        ];
        DB::table('reagent_types')->insert($reagents);
    }
}
