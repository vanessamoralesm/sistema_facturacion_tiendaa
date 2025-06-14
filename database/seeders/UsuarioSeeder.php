<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Usuario;
class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Usuario::insert([
            [
                'cedula' => '281-160205-1006B',
                'nombre' => 'María Pérez',
                'email' => 'maria@gmail.com',
                'password' => bcrypt('12345678'),
                'rol_tipo' => 'Administrador',
            ],
            [
                'cedula' => '281-160205-1006A',
                'nombre' => 'Luis García',
                'email' => 'luis@gamil.com',
                'password' => bcrypt('12345678'),
                'rol_tipo' => 'Administrador',
            ]
        ]);
    }
}
