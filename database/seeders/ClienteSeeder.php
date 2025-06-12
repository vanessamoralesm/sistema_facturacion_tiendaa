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
        Cliente::create([
            [
                'cedula' => '281-160205-1006C',
                'nombre' => 'Ana Torres',
                'correo' => 'ana@gamil.com',
                'direccion' => 'Laborio',
                'telefono' => '88426945'
            ]
        ]);
    }
}
