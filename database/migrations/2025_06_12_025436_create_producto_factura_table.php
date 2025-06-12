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
        Schema::create('producto_factura', function (Blueprint $table) {
            $table->id();// clave Primaria

            $table->unsignedBigInteger('id_factura');   // foránea
            $table->unsignedBigInteger('id_productos'); // foránea
        
            $table->integer('cant_productos');
            $table->decimal('valor_productos', 10, 2);
            $table->decimal('total_por_producto', 10, 2);
        
            $table->foreign('id_factura')->references('id')->on('facturas')->onDelete('cascade');
            $table->foreign('id_productos')->references('id')->on('productos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto_factura');
    }
};
