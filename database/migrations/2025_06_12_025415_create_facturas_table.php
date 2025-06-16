<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up():void
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();

            $table->string('cedula_usuario');
            $table->datetime('fecha');
            $table->string('cedula_cliente');
            $table->string('metodo_pago');
            $table->decimal('monto_recibido', 10, 2);
            $table->decimal('subtotal', 10, 2);
            $table->decimal('iva', 10, 2);
            $table->decimal('total', 10, 2);
            $table->decimal('vuelto', 10, 2);
            
            $table->timestamps();
            $table->foreign('cedula_usuario')->references('cedula')->on('usuarios');
            $table->foreign('cedula_cliente')->references('cedula')->on('clientes');
        });
    }

    public function down():void
    {
        Schema::dropIfExists('facturas');
    }
};
