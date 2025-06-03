<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userInfos = [
            ['name' => 'Admin User', 'email' => 'farlabadmin@farlab.com'],
            ['name' => 'Juan Beltran', 'email' => 'juanbeltran@farlab.com'],
            ['name' => 'Wendy Criollo', 'email' => 'wendycriollo@farlab.com'],
            ['name' => 'Carlos Noyola', 'email' => 'carlosnoyola@farlab.com'],
            ['name' => 'Cristian Rogel', 'email' => 'cristianrogel@farlab.com'],
            ['name' => 'Romeo Campos', 'email' => 'romeocampos@farlab.com'],
            ['name' => 'Glen Flores', 'email' => 'glenflores@farlab.com'],
            ['name' => 'Ester Hernández', 'email' => 'ester@farlab.com'],
            ['name' => 'Pablo Pineda', 'email' => 'pablopineda@farlab.com'],
            ['name' => 'Javier López', 'email' => 'javierlopez@farlab.com'],
            ['name' => 'Javier Henríquez', 'email' => 'javierhenriquez@farlab.com'],
            ['name' => 'Carlos Landaverde', 'email' => 'carloslandaverde@farlab.com'],
            ['name' => 'Alejandro Soriano', 'email' => 'alejandrosoriano@farla.com'],
            ['name' => 'Alfonso Vanegas', 'email' => 'alfonsovanegas@farlab.com'],
            ['name' => 'Josué Cabrera', 'email' => 'josuecabrera@farlab.com'],
            ['name' => 'John Chávez', 'email' => 'johnchavez@farlab.com'],
            ['name' => 'Hernan', 'email' => 'henan@farlab.com'],
            ['name' => 'Erwin', 'email' => 'erwin@farlab.com'],
        ];

        $users = [];
        foreach ($userInfos as $info) {
            $users[] = [
                'name' => $info['name'],
                'email' => $info['email'],
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'remember_token' => Str::random(10),
            ];
        }
        DB::table('users')->insert($users);
    }
}
