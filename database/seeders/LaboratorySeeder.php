<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaboratorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $laboratories = [
            // Hospital Nacional entries
            ['district_id' => 55, 'address' => 'Suchitoto', 'name' => 'Hospital Nacional de Suchitoto'],
            ['district_id' => 128, 'address' => 'La Unión', 'name' => 'Hospital Nacional de La Unión'],
            ['district_id' => 219, 'address' => 'Chalchuapa', 'name' => 'Hospital Nacional de Chalchuapa'],
            ['district_id' => 5, 'address' => 'Ahuachapán', 'name' => 'Hospital Nacional de Ahuachapán'],
            ['district_id' => 240, 'address' => 'Santiago de María', 'name' => 'Hospital Nacional de Santiago de María'],
            ['district_id' => 174, 'address' => 'Nueva Guadalupe', 'name' => 'Hospital Nacional de Nueva Guadalupe'],
            ['district_id' => 153, 'address' => 'San Francisco Gotera', 'name' => 'Hospital Nacional de Gotera'],
            ['district_id' => 13, 'address' => 'Sensuntepeque', 'name' => 'Hospital Nacional de Sensuntepeque'],
            ['district_id' => 259, 'address' => 'Jiquilisco', 'name' => 'Hospital Nacional de Jiquilisco'],
            ['district_id' => 249, 'address' => 'Usulután', 'name' => 'Hospital Nacional de Usulután'],
            ['district_id' => 159, 'address' => 'Ciudad Barrios', 'name' => 'Hospital Nacional de Ciudad Barrios'],
            ['district_id' => 212, 'address' => 'Metapán', 'name' => 'Hospital Nacional de Metapán'],
            ['district_id' => 124, 'address' => 'Santa Rosa de Lima', 'name' => 'Hospital Nacional de Santa Rosa de Lima'],
            ['district_id' => 25, 'address' => 'Nueva Concepción', 'name' => 'Hospital Nacional de Nueva Concepción'],
            ['district_id' => 35, 'address' => 'Chalatenango', 'name' => 'Hospital Nacional de Chalatenango'],

            // Regional Hospital entries
            ['district_id' => 190, 'address' => 'San Salvador', 'name' => 'Regional Metropolitano Barrios'],
            ['district_id' => 190, 'address' => 'San Salvador', 'name' => 'Regional Central El Coyolito'],
            ['district_id' => 198, 'address' => 'Apastepeque', 'name' => 'Regional Apastepeque, Paracentral'],
            ['district_id' => 167, 'address' => 'San Miguel', 'name' => 'Regional Oriental San Miguel'],
            ['district_id' => 215, 'address' => 'Santa Ana', 'name' => 'Regional Occidental Santa Ana'],

            // USCF entries
            ['district_id' => 219, 'address' => 'Chalchuapa', 'name' => 'USCF Chalchuapa'],
            ['district_id' => 212, 'address' => 'Metapán', 'name' => 'USCF Metapan'],
            ['district_id' => 88, 'address' => 'La Libertad', 'name' => 'USCF Lourdes'],
            ['district_id' => 8, 'address' => 'Tacuba', 'name' => 'USCF Tacuba'],
            ['district_id' => 167, 'address' => 'San Miguel', 'name' => 'USCF San Miguel'],
            ['district_id' => 185, 'address' => 'San Martín', 'name' => 'USCF San Martín - Ciudad Mujer'],
            ['district_id' => 92, 'address' => 'Santa Tecla', 'name' => 'USCF Santa Tecla - Díaz del Pinal'],
            ['district_id' => 88, 'address' => 'La Libertad', 'name' => 'USCF Puerto de la Libertad'],
            ['district_id' => 244, 'address' => 'Jucuapa', 'name' => 'USCF Jucuapa - Usulután'],
            ['district_id' => 260, 'address' => 'Puerto El Triunfo', 'name' => 'USCF Puerto el Triunfo - Usulután'],
            ['district_id' => 125, 'address' => 'Conchagua', 'name' => 'USCF Conchagua - La Unión'],
            ['district_id' => 128, 'address' => 'La Unión', 'name' => 'USCF La Playa - La Unión'],
            ['district_id' => 153, 'address' => 'San Francisco Gotera', 'name' => 'USCF San Francisco Gotera - Gotera'],
            ['district_id' => 140, 'address' => 'Perquín', 'name' => 'USCF Perquín - Morazán'],
            ['district_id' => 190, 'address' => 'San Salvador', 'name' => 'USCF Unicentro'],
            ['district_id' => 229, 'address' => 'Sonzacate', 'name' => 'USCF Sonzacate'],
            ['district_id' => 233, 'address' => 'Izalco', 'name' => 'USCF Izalco'],
            ['district_id' => 74, 'address' => 'San Juan Opico', 'name' => 'USCF Opico'],
            ['district_id' => 18, 'address' => 'Ilobasco', 'name' => 'USCF Ilobasco'],
            ['district_id' => 114, 'address' => 'Zacatecoluca', 'name' => 'USCF Carlos Galeano, Zacatecoluca'],
            ['district_id' => 71, 'address' => 'Quezaltepeque', 'name' => 'USCF Quezaltepeque, La libertad'],
            ['district_id' => 5, 'address' => 'Ahuachapán', 'name' => 'USCF Cara Sucia, Ahuachapán'],
            ['district_id' => 207, 'address' => 'Verapaz', 'name' => 'USCF Verapaz, San Vicente'],
            ['district_id' => 56, 'address' => 'San José Guayabal', 'name' => 'USCF San José Guayabal, Cabañas'],
            ['district_id' => 228, 'address' => 'Sonsonate', 'name' => 'USCF Sonsonate'],
            ['district_id' => 198, 'address' => 'Apastepeque', 'name' => 'USCF Periférica de Paracentral'],
            ['district_id' => 259, 'address' => 'Jiquilisco', 'name' => 'USCF Jiquilisco'],
            ['district_id' => 49, 'address' => 'San Francisco Lempa', 'name' => 'USCF San Nicolás Lempa'],
            ['district_id' => 22, 'address' => 'La Palma', 'name' => 'USCF La Palma'],
            ['district_id' => 60, 'address' => 'Cojutepeque', 'name' => 'USCF Cojutepeque'],
            ['district_id' => 29, 'address' => 'Dulce Nombre de María', 'name' => 'USCF Dulce Nombre de María, Chalatenango'],
            ['district_id' => 94, 'address' => 'Olocuilta', 'name' => 'USCF Olocuilta'],
            ['district_id' => 243, 'address' => 'Mercedes Umaña', 'name' => 'USCF Mercedes Umaña, Usulután'],
            ['district_id' => 185, 'address' => 'San Martín', 'name' => 'USCF San Martín'],
            ['district_id' => 5, 'address' => 'Ahuachapán', 'name' => 'USCF Ahuachapán'],
            ['district_id' => 239, 'address' => 'Acajutla', 'name' => 'USCF Acajutla'],
            ['district_id' => 215, 'address' => 'Santa Ana', 'name' => 'USCF SU San Rafael Santa Ana'],
            ['district_id' => 198, 'address' => 'Apastepeque', 'name' => 'USCF Apastepeque'],
            ['district_id' => 13, 'address' => 'Sensuntepeque', 'name' => 'USCF Sensuntepeque'],
            ['district_id' => 111, 'address' => 'Santiago Nonualco', 'name' => 'USCF Santiago Nonualco'],
            ['district_id' => 159, 'address' => 'Ciudad Barrios', 'name' => 'USCF Ciudad Barrios'],
            ['district_id' => 115, 'address' => 'Anamorós', 'name' => 'USCF Anamoros'],
            ['district_id' => 190, 'address' => 'San Salvador', 'name' => 'USCF San Miguelito'],
            ['district_id' => 149, 'address' => 'Jocoro', 'name' => 'USCF Jocoro'],
            ['district_id' => 197, 'address' => 'Santiago Texacuangos', 'name' => 'USCF Santiago Texacuangos'],
            ['district_id' => 217, 'address' => 'El Congo', 'name' => 'USCF El congo'],
            ['district_id' => 75, 'address' => 'Ciudad Arce', 'name' => 'USCF Ciudad Arce'],
            ['district_id' => 234, 'address' => 'Armenia', 'name' => 'USCF Armenia'],
            ['district_id' => 252, 'address' => 'Concepción Batres', 'name' => 'USCF Concepcion Batres'],
            ['district_id' => 215, 'address' => 'Santa Ana', 'name' => 'USCF Santa Barbara, Santa Ana'],
            ['district_id' => 61, 'address' => 'San Rafael Cedros', 'name' => 'USCF san rafael cedros'],
            ['district_id' => 182, 'address' => 'Apopa', 'name' => 'USCF Apopa'],
            ['district_id' => 190, 'address' => 'San Salvador', 'name' => 'USCF Barrios, San Salvador'],
            ['district_id' => 167, 'address' => 'San Miguel', 'name' => 'USCF Zamorano, San Miguel'],
            ['district_id' => 183, 'address' => 'Nejapa', 'name' => 'USCF USI NEJAPA'],
            ['district_id' => 249, 'address' => 'Usulután', 'name' => 'USCF CIUDAD MUJER USULUTAN'],
            ['district_id' => 190, 'address' => 'San Salvador', 'name' => 'USCF USI Zacamil'],
            ['district_id' => 107, 'address' => 'San Luis La Herradura', 'name' => 'USCF USI La Herradura'],

            // Fosalud entries
            ['district_id' => 1, 'address' => 'Atiquizaya', 'name' => 'Fosalud Atiquizaya'],
            ['district_id' => 190, 'address' => 'San Salvador', 'name' => 'Fosalud San Jacinto'],
            ['district_id' => 215, 'address' => 'Santa Ana', 'name' => 'Fosalud Tomas Pineda , Santa Ana'],
            ['district_id' => 167, 'address' => 'San Miguel', 'name' => 'Fosalud San Miguel'],
            ['district_id' => 167, 'address' => 'San Miguel', 'name' => 'Fosalud La presita'],
            ['district_id' => 190, 'address' => 'San Salvador', 'name' => 'Fosalud Metropolitano Barrios'],
            ['district_id' => 190, 'address' => 'San Salvador', 'name' => 'Fosalud Central El Coyolito'],
            ['district_id' => 198, 'address' => 'Apastepeque', 'name' => 'Fosalud Apastepeque, Paracentral'],
            ['district_id' => 167, 'address' => 'San Miguel', 'name' => 'Fosalud Oriental San Miguel'],
            ['district_id' => 215, 'address' => 'Santa Ana', 'name' => 'Fosalud Occidental Santa Ana']
        ];

        DB::table('laboratories')->insert($laboratories);
    }
}
