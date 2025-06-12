<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id(); // clave primaria
            $table->date('fecha');
            $table->decimal('monto', 10, 2);
            $table->string('cedula_usuario'); // foránea
            $table->string('cedula_cliente'); // foránea
        
            $table->foreign('cedula_usuario')->references('cedula')->on('usuarios');
            $table->foreign('cedula_cliente')->references('cedula')->on('clientes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas');
    }
};
