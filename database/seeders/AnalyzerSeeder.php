<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnalyzerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $analyzers = [
            ['area' => 'Hematologia', 'name' => 'BC3000Plus'],
            ['area' => 'Hematologia', 'name' => 'BC10'],
            ['area' => 'Hematologia', 'name' => 'BC20'],
            ['area' => 'Hematologia', 'name' => 'BC20s'],
            ['area' => 'Hematologia', 'name' => 'BC5150'],
            ['area' => 'Hematologia', 'name' => 'BC5390'],
            ['area' => 'Hematologia', 'name' => 'BC5800'],
            ['area' => 'Hematologia', 'name' => 'BC6200Plus'],
            ['area' => 'Hematologia', 'name' => 'Spincell 5 compact'],
        ];

        DB::table('analyzers')->insert($analyzers);

    }
}
