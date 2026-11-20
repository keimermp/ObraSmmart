<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('usuario_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->foreignId('tipo_trabajo_id')
                ->constrained('tipo_trabajos')
                ->onDelete('restrict');

            $table->string('nombre', 150);

            $table->text('descripcion')->nullable();

            $table->decimal('largo', 12, 4)->nullable();

            $table->decimal('ancho', 12, 4)->nullable();

            $table->decimal('alto', 12, 4)->nullable();

            $table->string('unidad_medida', 10)->default('m');

            $table->string('estado', 30)->default('ACTIVO');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('proyectos');
    }
};