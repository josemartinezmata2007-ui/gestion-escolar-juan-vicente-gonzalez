<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('representante_id')->constrained('representantes')->onDelete('cascade');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('cedula')->unique();
            $table->string('grado');
            $table->string('curso');
            $table->date('fecha_inscripcion');
            $table->enum('estado', ['activa', 'pendiente', 'finalizada'])->default('pendiente');
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inscripciones');
    }
};
