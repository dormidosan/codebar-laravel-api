<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EquipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $equipos = [
            ['area' => 'Hematologia', 'nombre' => 'BC5150'],
            ['area' => 'Hematologia', 'nombre' => 'BC5300'],
            ['area' => 'Hematologia', 'nombre' => 'BC5500'],
            ['area' => 'Hematologia', 'nombre' => 'BC5800'],
            ['area' => 'Hematologia', 'nombre' => 'BC6200'],
            ['area' => 'Hematologia', 'nombre' => 'BC6800'],
            ['area' => 'Coagulacion', 'nombre' => 'C5130'],
            ['area' => 'Coagulacion', 'nombre' => 'C5000']
        ];

        \DB::table('equipos')->insert($equipos);

    }
}
