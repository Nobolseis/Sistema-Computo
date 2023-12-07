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
        Schema::create('mantenimientos', function (Blueprint $table) {
            $table->id();
            $table->string('NumeroInventario', 100);
            $table->string('Marca', 100);
            $table->string('Modelo', 100);
            $table->string('NumSerie', 100);
            $table->string('Caracteristicas', 100);
            $table->string('Problema', 100);
            $table->string('Diagnostico', 100);
            $table->string('Ubicacion', 100);
            $table->string('Foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mantenimientos');
    }
};
