<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Producto::insert([
            [
                'nombre' => 'Pantalon',
                'precio' => 700,
                'detalle' => 'Azul',
                'cant_disponible' => 10
            ],
            [
                'nombre' => 'Camisa',
                'precio' => 300,
                'detalle' => 'XL',
                'cant_disponible' => 20
            ]
        ]);
    }
}
