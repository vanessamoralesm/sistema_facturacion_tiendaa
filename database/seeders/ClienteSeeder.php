<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cliente::insert([
            [
                'cedula' => '281-160205-1006C',
                'nombre' => 'Ana Torres',
                'correo' => 'ana@gmail.com',
                'direccion' => 'Laborio',
                'telefono' => '88426945'
            ],
            [
                'cedula' => '281-110399-1007B',
                'nombre' => 'Carlos Pérez',
                'correo' => 'carlos@gmail.com',
                'direccion' => 'Managua',
                'telefono' => '86741230'
            ],
            [
                'cedula' => '281-250191-1008C',
                'nombre' => 'Lucía Ramírez',
                'correo' => 'lucia@gmail.com',
                'direccion' => 'León',
                'telefono' => '87963421'
            ],
            [
                'cedula' => '281-101288-1009D',
                'nombre' => 'José Martínez',
                'correo' => 'jose@gmail.com',
                'direccion' => 'Masaya',
                'telefono' => '84567320'
            ],
            [
                'cedula' => '281-160975-1010E',
                'nombre' => 'María López',
                'correo' => 'maria@gmail.com',
                'direccion' => 'Estelí',
                'telefono' => '89674210'
            ],
            [
                'cedula' => '281-150183-1011F',
                'nombre' => 'Pedro Sánchez',
                'correo' => 'pedro@gmail.com',
                'direccion' => 'Chinandega',
                'telefono' => '83214567'
            ],
            [
                'cedula' => '281-200594-1012G',
                'nombre' => 'Juana García',
                'correo' => 'juana@gmail.com',
                'direccion' => 'Jinotega',
                'telefono' => '87001123'
            ],
            [
                'cedula' => '281-010180-1013H',
                'nombre' => 'Andrés Gutiérrez',
                'correo' => 'andres@gmail.com',
                'direccion' => 'Granada',
                'telefono' => '85993210'
            ],
            [
                'cedula' => '281-300677-1014I',
                'nombre' => 'Laura Méndez',
                'correo' => 'laura@gmail.com',
                'direccion' => 'Matagalpa',
                'telefono' => '84832210'
            ]
        ]);
        
    }
}
