<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Factura;
class FacturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Factura::create([
            'fecha' => now(),
            'monto' => 725,
            'cedula_usuario' => '281-160205-1006B',
            'cedula_cliente' => '281-160205-1006C'
        ]);
    }
}
