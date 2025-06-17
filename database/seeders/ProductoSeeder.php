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
                'detalle' => 'Algodón',
                'stock' => 10,
                'talla' => '6', // Niño
                'tipo' => 'niño',
                'color' => 'Azul',
                'marca' => 'Polo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Camisa',
                'precio' => 300.00,
                'detalle' => 'Algodón',
                'stock' => 20,
                'talla' => 'XL', // Adulto
                'tipo' => 'mujer',
                'color' => 'Rojo',
                'marca' => 'Nike',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Vestido niña',
                'precio' => 450.00,
                'detalle' => 'Seda',
                'stock' => 15,
                'talla' => '8', // Niño
                'tipo' => 'niña',
                'color' => 'Rosado',
                'marca' => 'Zara',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Chaqueta',
                'precio' => 1200.00,
                'detalle' => 'Cuero sintético',
                'stock' => 5,
                'talla' => 'M', // Adulto
                'tipo' => 'hombre',
                'color' => 'Negro',
                'marca' => 'Adidas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Blusa',
                'precio' => 250.00,
                'detalle' => 'Poliéster',
                'stock' => 30,
                'talla' => 'S', // Adulto
                'tipo' => 'mujer',
                'color' => 'Blanco',
                'marca' => 'Forever 21',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Jeans',
                'precio' => 800.00,
                'detalle' => 'Mezclilla',
                'stock' => 12,
                'talla' => '32', // (supongamos adulto)
                'tipo' => 'hombre',
                'color' => 'Marrón',
                'marca' => 'Levis',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Falda',
                'precio' => 350.00,
                'detalle' => 'Algodón',
                'stock' => 18,
                'talla' => 'L', // Adulto
                'tipo' => 'mujer',
                'color' => 'Amarillo',
                'marca' => 'Mango',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Suéter niño',
                'precio' => 400.00,
                'detalle' => 'Lana',
                'stock' => 8,
                'talla' => '10', // Niño
                'tipo' => 'niño',
                'color' => 'Gris',
                'marca' => 'Old Navy',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Pijama mujer',
                'precio' => 500.00,
                'detalle' => 'Algodón suave',
                'stock' => 22,
                'talla' => 'XXL', // Adulto
                'tipo' => 'mujer',
                'color' => 'Celeste',
                'marca' => 'Victoria’s Secret',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
        
    }
}
