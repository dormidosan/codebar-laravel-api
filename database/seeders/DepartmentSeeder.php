<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
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
        $departments = [
            ['id' => 1, 'code' => 'd1', 'name' => 'Ahuachapán'],
            ['id' => 2, 'code' => 'd2', 'name' => 'Cabañas'],
            ['id' => 3, 'code' => 'd3', 'name' => 'Chalatenango'],
            ['id' => 4, 'code' => 'd4', 'name' => 'Cuscatlán'],
            ['id' => 5, 'code' => 'd5', 'name' => 'La Libertad'],
            ['id' => 6, 'code' => 'd6', 'name' => 'La Paz'],
            ['id' => 7, 'code' => 'd7', 'name' => 'La Unión'],
            ['id' => 8, 'code' => 'd8', 'name' => 'Morazán'],
            ['id' => 9, 'code' => 'd9', 'name' => 'San Miguel'],
            ['id' => 10, 'code' => 'd10', 'name' => 'San Salvador'],
            ['id' => 11, 'code' => 'd11', 'name' => 'San Vicente'],
            ['id' => 12, 'code' => 'd12', 'name' => 'Santa Ana'],
            ['id' => 13, 'code' => 'd13', 'name' => 'Sonsonate'],
            ['id' => 14, 'code' => 'd14', 'name' => 'Usulután'],
        ];
        DB::table('departments')->insert($departments);

    }
}
