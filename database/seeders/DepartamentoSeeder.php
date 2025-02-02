<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        1	d1	Ahuachapán
//        3	d2	Cabañas
//        4	d3	Chalatenango
//        5	d4	Cuscatlán
//        6	d5	La Libertad
//        7	d6	La Paz
//        8	d7	La Unión
//        9	d8	Morazán
//        10	d9	San Miguel
//        11	d10	San Salvador
//        12	d11	San Vicente
//        13	d12	Santa Ana
//        14	d13	Sonsonate
//        15	d14	Usulután
        //Inserting values
        $departamentos = [
            ['id' => 1,'codigo' => 'd1', 'nombre' => 'Ahuachapán'],
            ['id' => 2,'codigo' => 'd2', 'nombre' => 'Cabañas'],
            ['id' => 3,'codigo' => 'd3', 'nombre' => 'Chalatenango'],
            ['id' => 4,'codigo' => 'd4', 'nombre' => 'Cuscatlán'],
            ['id' => 5,'codigo' => 'd5', 'nombre' => 'La Libertad'],
            ['id' => 6,'codigo' => 'd6', 'nombre' => 'La Paz'],
            ['id' => 7,'codigo' => 'd7', 'nombre' => 'La Unión'],
            ['id' => 8,'codigo' => 'd8', 'nombre' => 'Morazán'],
            ['id' => 9,'codigo' => 'd9', 'nombre' => 'San Miguel'],
            ['id' => 10,'codigo' => 'd10', 'nombre' => 'San Salvador'],
            ['id' => 11,'codigo' => 'd11', 'nombre' => 'San Vicente'],
            ['id' => 12,'codigo' => 'd12', 'nombre' => 'Santa Ana'],
            ['id' => 13,'codigo' => 'd13', 'nombre' => 'Sonsonate'],
            ['id' => 14,'codigo' => 'd14', 'nombre' => 'Usulután'],
        ];
        \DB::table('departamentos')->insert($departamentos);

    }
}
