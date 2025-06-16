<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up():void
    {
        Schema::create('producto_factura', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('factura_id');
            $table->unsignedBigInteger('producto_id');

            $table->decimal('cantidad', 10, 2);
            $table->decimal('precio', 10, 2);
            $table->decimal('descuento', 10, 2)->default(0);
            $table->decimal('subtotal', 10, 2);
            
            $table->timestamps();
            $table->foreign('factura_id')->references('id')->on('facturas')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('productos');
        });
    }

    public function down():void
    {
        Schema::dropIfExists('productos_factura');
    }
};
