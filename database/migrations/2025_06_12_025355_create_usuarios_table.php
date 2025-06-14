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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->string('cedula')->primary(); // clave primaria
            $table->string('nombre');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('rol_tipo'); // clave foránea
        
            $table->foreign('rol_tipo')->references('tipo')->on('roles');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
