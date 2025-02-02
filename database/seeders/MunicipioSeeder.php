<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MunicipioSeeder extends Seeder
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

        $municipios = [
            ['id' => 1, 'departamento_id' => 1, 'nombre' => 'Ahuachapán Norte'],
            ['id' => 2, 'departamento_id' => 1, 'nombre' => 'Ahuachapán Centro'],
            ['id' => 3, 'departamento_id' => 1, 'nombre' => 'Ahuachapán Sur'],
            ['id' => 4, 'departamento_id' => 2, 'nombre' => 'Cabañas Este'],
            ['id' => 5, 'departamento_id' => 2, 'nombre' => 'Cabañas Oeste'],
            ['id' => 6, 'departamento_id' => 3, 'nombre' => 'Chalatenango Norte'],
            ['id' => 7, 'departamento_id' => 3, 'nombre' => 'Chalatenango Centro'],
            ['id' => 8, 'departamento_id' => 3, 'nombre' => 'Chalatenango Sur'],
            ['id' => 9, 'departamento_id' => 4, 'nombre' => 'Cuscatlán Norte'],
            ['id' => 10, 'departamento_id' => 4, 'nombre' => 'Cuscatlán Sur'],
            ['id' => 11, 'departamento_id' => 5, 'nombre' => 'La Libertad Norte'],
            ['id' => 12, 'departamento_id' => 5, 'nombre' => 'La Libertad Centro'],
            ['id' => 13, 'departamento_id' => 5, 'nombre' => 'La Libertad Oeste'],
            ['id' => 14, 'departamento_id' => 5, 'nombre' => 'La Libertad Este'],
            ['id' => 15, 'departamento_id' => 5, 'nombre' => 'La Libertad Costa'],
            ['id' => 16, 'departamento_id' => 5, 'nombre' => 'La Libertad Sur'],
            ['id' => 17, 'departamento_id' => 6, 'nombre' => 'La Paz Oeste'],
            ['id' => 18, 'departamento_id' => 6, 'nombre' => 'La Paz Centro'],
            ['id' => 19, 'departamento_id' => 6, 'nombre' => 'La Paz Este'],
            ['id' => 20, 'departamento_id' => 7, 'nombre' => 'La Unión Norte'],
            ['id' => 21, 'departamento_id' => 7, 'nombre' => 'La Unión Sur'],
            ['id' => 22, 'departamento_id' => 8, 'nombre' => 'Morazán Norte'],
            ['id' => 23, 'departamento_id' => 8, 'nombre' => 'Morazán Sur'],
            ['id' => 24, 'departamento_id' => 9, 'nombre' => 'San Miguel Norte'],
            ['id' => 25, 'departamento_id' => 9, 'nombre' => 'San Miguel Centro'],
            ['id' => 26, 'departamento_id' => 9, 'nombre' => 'San Miguel Oeste'],
            ['id' => 27, 'departamento_id' => 10, 'nombre' => 'San Salvador Norte'],
            ['id' => 28, 'departamento_id' => 10, 'nombre' => 'San Salvador Oeste'],
            ['id' => 29, 'departamento_id' => 10, 'nombre' => 'San Salvador Este'],
            ['id' => 30, 'departamento_id' => 10, 'nombre' => 'San Salvador Centro'],
            ['id' => 31, 'departamento_id' => 10, 'nombre' => 'San Salvador Sur'],
            ['id' => 32, 'departamento_id' => 11, 'nombre' => 'San Vicente Norte'],
            ['id' => 33, 'departamento_id' => 11, 'nombre' => 'San Vicente Sur'],
            ['id' => 34, 'departamento_id' => 12, 'nombre' => 'Santa Ana Norte'],
            ['id' => 35, 'departamento_id' => 12, 'nombre' => 'Santa Ana Centro'],
            ['id' => 36, 'departamento_id' => 12, 'nombre' => 'Santa Ana Este'],
            ['id' => 37, 'departamento_id' => 12, 'nombre' => 'Santa Ana Oeste'],
            ['id' => 38, 'departamento_id' => 13, 'nombre' => 'Sonsonate Norte'],
            ['id' => 39, 'departamento_id' => 13, 'nombre' => 'Sonsonate Centro'],
            ['id' => 40, 'departamento_id' => 13, 'nombre' => 'Sonsonate Este'],
            ['id' => 41, 'departamento_id' => 13, 'nombre' => 'Sonsonate Oeste'],
            ['id' => 42, 'departamento_id' => 14, 'nombre' => 'Usulután Norte'],
            ['id' => 43, 'departamento_id' => 14, 'nombre' => 'Usulután Este'],
            ['id' => 44, 'departamento_id' => 14, 'nombre' => 'Usulután Oeste']
        ];
        \DB::table('municipios')->insert($municipios);
    }
}
