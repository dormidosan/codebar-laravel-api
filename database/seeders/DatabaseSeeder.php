<?php

namespace Database\Seeders;

use App\Models\DetalleReactivo;
use App\Models\EquipoReactivo;
use App\Models\Laboratorio;
use App\Models\Reactivo;
use App\Models\ReactivoAsignado;
use App\Models\Usuario;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);
        //User departamentos seeder
        $this->call(DepartamentoSeeder::class);
        $this->call(MunicipioSeeder::class);
        $this->call(DistritoSeeder::class);


        Usuario::factory(20)->create();
        Laboratorio::factory(50)->create();

        //8 Equipos seeder
        $this->call(EquipoSeeder::class);

        Reactivo::factory(50)->create();

        EquipoReactivo::factory(50)->create();

        DetalleReactivo::factory(50)->create();

        ReactivoAsignado::factory(50)->create();






    }
}
