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
        Schema::create('asistencias', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre', 100);
            $table->string('Matricula', 100);
            $table->string('Carrera', 100);
            $table->string('Semestre', 100);
            $table->string('Grupo', 100);
            $table->timestamp('FechaIngreso')->useCurrent();
            $table->timestamp('FechaSalida')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asistencias');
    }
};
