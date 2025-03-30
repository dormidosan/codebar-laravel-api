<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarcodeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $barcodeTypes = [
            ['id' => 1, 'name' => 'code128'],
            ['id' => 2, 'name' => 'aztec'],
            ['id' => 3, 'name' => 'ean13'],
            ['id' => 4, 'name' => 'ean8'],
            ['id' => 5, 'name' => 'qr'],
            ['id' => 6, 'name' => 'pdf417'],
            ['id' => 7, 'name' => 'upc_e'],
            ['id' => 8, 'name' => 'datamatrix'],
            ['id' => 9, 'name' => 'code39'],
            ['id' => 10, 'name' => 'code93'],
            ['id' => 11, 'name' => 'itf14'],
            ['id' => 12, 'name' => 'codabar'],
            ['id' => 13, 'name' => 'upc_a'],
        ];
        DB::table('barcode_types')->insert($barcodeTypes);
    }
}
