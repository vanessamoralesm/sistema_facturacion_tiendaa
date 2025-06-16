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
                'nombre' => 'Pantalón',
                'precio' => 700.00,
                'detalle' => 'Algodon',
                'stock' => 10,
                'talla' => '6',
                'tipo' => 'niño',
                'color' => 'Azul',
                'marca' => 'Polo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Camisa',
                'precio' => 300.00,
                'detalle' => 'Algodon',
                'stock' => 20,
                'talla' => 'XL',
                'tipo' => 'mujer',
                'color' => 'Rojo',
                'marca' => 'Nike',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Vestido niña',
                'precio' => 450.00,
                'detalle' => 'seda',
                'stock' => 15,
                'talla' => '8',
                'tipo' => 'niña',
                'color' => 'Rosado',
                'marca' => 'Zara',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
