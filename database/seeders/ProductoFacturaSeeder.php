<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\ProductoFactura;
class ProductoFacturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductoFactura::create([
            [
                'id_factura' => 1,
                'id_productos' => 1,
                'cant_productos' => 1,
                'valor_productos' => 700,
                'total_por_producto' => 700
            ],
            [
                'id_factura' => 1,
                'id_productos' => 2,
                'cant_productos' => 1,
                'valor_productos' => 25,
                'total_por_producto' => 25
            ]
        ]);
    }
}
