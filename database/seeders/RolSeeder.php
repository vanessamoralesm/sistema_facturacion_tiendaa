<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Rol;
class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rol::insert([
            [
                'id'=>1,
                'tipo' => 'Administrador'
            ],
            [
                'id'=>2,
                'tipo' => 'Vendedor'
            ]

        ]);
    }
}
