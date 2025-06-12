<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Database\Seeders\RolSeeder;
use Database\Seeders\UsuarioSeeder;
use Database\Seeders\ClienteSeeder;
use Database\Seeders\ProductoSeeder;
use Database\Seeders\FacturaSeeder;
use Database\Seeders\ProductoFacturaSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolSeeder::class,
            UsuarioSeeder::class,
            ClienteSeeder::class,
            ProductoSeeder::class,
            FacturaSeeder::class,
            ProductoFacturaSeeder::class,
        ]);
    }
    
}
