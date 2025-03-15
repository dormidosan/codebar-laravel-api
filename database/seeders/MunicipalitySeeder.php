<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MunicipalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //1	1	Ahuachapán Norte
        //2	1	Ahuachapán Centro
        //3	1	Ahuachapán Sur
        //4	2	Cabañas Este
        //5	2	Cabañas Oeste
        //6	3	Chalatenango Norte
        //7	3	Chalatenango Centro
        //8	3	Chalatenango Sur
        //9	4	Cuscatlán Norte
        //10	4	Cuscatlán Sur
        //11	5	La Libertad Norte
        //12	5	La Libertad Centro
        //13	5	La Libertad Oeste
        //14	5	La Libertad Este
        //15	5	La Libertad Costa
        //16	5	La Libertad Sur
        //17	6	La Paz Oeste
        //18	6	La Paz Centro
        //19	6	La Paz Este
        //20	7	La Unión Norte
        //21	7	La Unión Sur
        //22	8	Morazán Norte
        //23	8	Morazán Sur
        //24	9	San Miguel Norte
        //25	9	San Miguel Centro
        //26	9	San Miguel Oeste
        //27	10	San Salvador Norte
        //28	10	San Salvador Oeste
        //29	10	San Salvador Este
        //30	10	San Salvador Centro
        //31	10	San Salvador Sur
        //32	11	San Vicente Norte
        //33	11	San Vicente Sur
        //34	12	Santa Ana Norte
        //35	12	Santa Ana Centro
        //36	12	Santa Ana Este
        //37	12	Santa Ana Oeste
        //38	13	Sonsonate Norte
        //39	13	Sonsonate Centro
        //40	13	Sonsonate Este
        //41	13	Sonsonate Oeste
        //42	14	Usulután Norte
        //43	14	Usulután Este
        //44	14	Usulután Oeste

        $municipalities = [
            ['id' => 1, 'department_id' => 1, 'name' => 'Ahuachapán Norte'],
            ['id' => 2, 'department_id' => 1, 'name' => 'Ahuachapán Centro'],
            ['id' => 3, 'department_id' => 1, 'name' => 'Ahuachapán Sur'],
            ['id' => 4, 'department_id' => 2, 'name' => 'Cabañas Este'],
            ['id' => 5, 'department_id' => 2, 'name' => 'Cabañas Oeste'],
            ['id' => 6, 'department_id' => 3, 'name' => 'Chalatenango Norte'],
            ['id' => 7, 'department_id' => 3, 'name' => 'Chalatenango Centro'],
            ['id' => 8, 'department_id' => 3, 'name' => 'Chalatenango Sur'],
            ['id' => 9, 'department_id' => 4, 'name' => 'Cuscatlán Norte'],
            ['id' => 10, 'department_id' => 4, 'name' => 'Cuscatlán Sur'],
            ['id' => 11, 'department_id' => 5, 'name' => 'La Libertad Norte'],
            ['id' => 12, 'department_id' => 5, 'name' => 'La Libertad Centro'],
            ['id' => 13, 'department_id' => 5, 'name' => 'La Libertad Oeste'],
            ['id' => 14, 'department_id' => 5, 'name' => 'La Libertad Este'],
            ['id' => 15, 'department_id' => 5, 'name' => 'La Libertad Costa'],
            ['id' => 16, 'department_id' => 5, 'name' => 'La Libertad Sur'],
            ['id' => 17, 'department_id' => 6, 'name' => 'La Paz Oeste'],
            ['id' => 18, 'department_id' => 6, 'name' => 'La Paz Centro'],
            ['id' => 19, 'department_id' => 6, 'name' => 'La Paz Este'],
            ['id' => 20, 'department_id' => 7, 'name' => 'La Unión Norte'],
            ['id' => 21, 'department_id' => 7, 'name' => 'La Unión Sur'],
            ['id' => 22, 'department_id' => 8, 'name' => 'Morazán Norte'],
            ['id' => 23, 'department_id' => 8, 'name' => 'Morazán Sur'],
            ['id' => 24, 'department_id' => 9, 'name' => 'San Miguel Norte'],
            ['id' => 25, 'department_id' => 9, 'name' => 'San Miguel Centro'],
            ['id' => 26, 'department_id' => 9, 'name' => 'San Miguel Oeste'],
            ['id' => 27, 'department_id' => 10, 'name' => 'San Salvador Norte'],
            ['id' => 28, 'department_id' => 10, 'name' => 'San Salvador Oeste'],
            ['id' => 29, 'department_id' => 10, 'name' => 'San Salvador Este'],
            ['id' => 30, 'department_id' => 10, 'name' => 'San Salvador Centro'],
            ['id' => 31, 'department_id' => 10, 'name' => 'San Salvador Sur'],
            ['id' => 32, 'department_id' => 11, 'name' => 'San Vicente Norte'],
            ['id' => 33, 'department_id' => 11, 'name' => 'San Vicente Sur'],
            ['id' => 34, 'department_id' => 12, 'name' => 'Santa Ana Norte'],
            ['id' => 35, 'department_id' => 12, 'name' => 'Santa Ana Centro'],
            ['id' => 36, 'department_id' => 12, 'name' => 'Santa Ana Este'],
            ['id' => 37, 'department_id' => 12, 'name' => 'Santa Ana Oeste'],
            ['id' => 38, 'department_id' => 13, 'name' => 'Sonsonate Norte'],
            ['id' => 39, 'department_id' => 13, 'name' => 'Sonsonate Centro'],
            ['id' => 40, 'department_id' => 13, 'name' => 'Sonsonate Este'],
            ['id' => 41, 'department_id' => 13, 'name' => 'Sonsonate Oeste'],
            ['id' => 42, 'department_id' => 14, 'name' => 'Usulután Norte'],
            ['id' => 43, 'department_id' => 14, 'name' => 'Usulután Este'],
            ['id' => 44, 'department_id' => 14, 'name' => 'Usulután Oeste']
        ];
        DB::table('municipalities')->insert($municipalities);
    }
}
