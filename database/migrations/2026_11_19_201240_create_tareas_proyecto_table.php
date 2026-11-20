<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tareas_proyecto', function (Blueprint $table) {
            $table->id();

            $table->foreignId('proyecto_id')
                ->constrained('proyectos')
                ->onDelete('cascade');

            $table->string('nombre', 150);

            $table->text('descripcion')->nullable();

            $table->date('fecha_inicio');

            $table->date('fecha_fin');

            $table->decimal('porcentaje_avance', 5, 2)
                ->default(0);

            $table->string('estado', 30)
                ->default('PENDIENTE');

            $table->integer('orden')->default(1);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tareas_proyecto');
    }
};