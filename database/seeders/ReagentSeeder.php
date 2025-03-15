<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReagentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reagents = [
            ['reagent_type_id' => 1, 'code' => 'M10', 'name' => 'M30 Lyse 500 mL', 'volume' => '500 ml'],
            ['reagent_type_id' => 1, 'code' => 'M20', 'name' => 'M10 Lyse 500 mL', 'volume' => '500 ml'],
            ['reagent_type_id' => 1, 'code' => 'M52', 'name' => 'M20 Lyse 500 mL', 'volume' => '500 ml'],
            ['reagent_type_id' => 1, 'code' => 'M53', 'name' => 'M52 LH Lyse 100 mL', 'volume' => '100 ml'],
            ['reagent_type_id' => 1, 'code' => 'M5', 'name' => 'M52 DIFF Lyse 500 mL', 'volume' => '500 ml'],
            ['reagent_type_id' => 1, 'code' => 'M58', 'name' => 'M53 LH Lyse 1L', 'volume' => '1L'],
            ['reagent_type_id' => 1, 'code' => 'M58', 'name' => 'M5 Leo I Lyse 1L/500 mL', 'volume' => '1L/500 ml'],
            ['reagent_type_id' => 1, 'code' => 'M58', 'name' => 'M5 Leo II Lyse 500 mL', 'volume' => '500 ml'],
            ['reagent_type_id' => 1, 'code' => 'M58', 'name' => 'M58 LH Lyse 500 mL', 'volume' => '500 ml'],
            ['reagent_type_id' => 1, 'code' => 'M58', 'name' => 'M58 Leo I Lyse 1L/500 mL', 'volume' => '1L/500 ml'],
            ['reagent_type_id' => 1, 'code' => 'M58', 'name' => 'M58 Leo II Lyse 500 mL', 'volume' => '500 ml'],
            ['reagent_type_id' => 1, 'code' => 'M58', 'name' => 'M58 LBA Lyse 1L', 'volume' => '1L'],
            ['reagent_type_id' => 1, 'code' => 'M-6', 'name' => 'M-6 LN Lyse 1L', 'volume' => '1L'],
            ['reagent_type_id' => 1, 'code' => 'M-6', 'name' => 'M-6 LD Lyse 1L', 'volume' => '1L'],
            ['reagent_type_id' => 1, 'code' => 'M-6', 'name' => 'M-6 LH Lyse 1L', 'volume' => '1L'],
            ['reagent_type_id' => 1, 'code' => 'Lisante', 'name' => 'Lisante Spincell 5 1L', 'volume' => '1L'],
            ['reagent_type_id' => 2, 'code' => 'M30D', 'name' => 'M30D 20L', 'volume' => '20L'],
            ['reagent_type_id' => 2, 'code' => 'M52D', 'name' => 'M52D 20L', 'volume' => '20L'],
            ['reagent_type_id' => 2, 'code' => 'M53D', 'name' => 'M53D 20L', 'volume' => '20L'],
            ['reagent_type_id' => 2, 'code' => 'M58D', 'name' => 'M58D 20L', 'volume' => '20L'],
            ['reagent_type_id' => 2, 'code' => 'Diluyente', 'name' => 'Diluyente DS 20L', 'volume' => '20L'],
            ['reagent_type_id' => 2, 'code' => 'Diluyente', 'name' => 'Diluyente Spincell 5 20L', 'volume' => '20L'],
            ['reagent_type_id' => 3, 'code' => 'M-6', 'name' => 'M-6 FN 12 mL', 'volume' => '12 ml'],
            ['reagent_type_id' => 3, 'code' => 'M-6', 'name' => 'M-6 FD 12 mL', 'volume' => '12 ml'],
            ['reagent_type_id' => 4, 'code' => 'EZ', 'name' => 'EZ- Cleanser 100 mL', 'volume' => '100 ml'],
            [
                'reagent_type_id' => 4, 'code' => 'EZ', 'name' => 'EZ- Cleanser 100 mL/Probe Cleanser 17 mL',
                'volume' => '100 ml/17 ml'
            ],
            ['reagent_type_id' => 4, 'code' => 'Probe', 'name' => 'Probe Cleanser 50 mL', 'volume' => '50 ml'],
            ['reagent_type_id' => 4, 'code' => 'Probe', 'name' => 'Probe Cleanser 100 mL', 'volume' => '100 ml'],
            ['reagent_type_id' => 5, 'code' => 'M53', 'name' => 'M53 Cleanser', 'volume' => ''],
            ['reagent_type_id' => 5, 'code' => 'M58', 'name' => 'M58 Cleanser', 'volume' => ''],
            ['reagent_type_id' => 5, 'code' => 'Detergente', 'name' => 'Detergente Spincell 5 20L', 'volume' => '20L'],
            ['reagent_type_id' => 6, 'code' => 'Sheat', 'name' => 'Sheat Spincell 5 20L', 'volume' => '20L'],
        ];

        DB::table('reagents')->insert($reagents);
    }
}
