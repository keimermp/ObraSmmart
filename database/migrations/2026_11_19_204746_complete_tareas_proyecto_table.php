<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tareas_proyecto', function (Blueprint $table) {

            $table->foreignId('proyecto_id')
                ->constrained('proyectos')
                ->cascadeOnDelete();

            $table->string('nombre', 150);

            $table->text('descripcion')->nullable();

            $table->date('fecha_inicio');

            $table->date('fecha_fin');

            $table->decimal('porcentaje_avance', 5, 2)
                ->default(0);

            $table->string('estado', 30)
                ->default('PENDIENTE');

        });
    }

    public function down(): void
    {
        Schema::table('tareas_proyecto', function (Blueprint $table) {

            $table->dropForeign(['proyecto_id']);

            $table->dropColumn([
                'proyecto_id',
                'nombre',
                'descripcion',
                'fecha_inicio',
                'fecha_fin',
                'porcentaje_avance',
                'estado',
            ]);

        });
    }
};