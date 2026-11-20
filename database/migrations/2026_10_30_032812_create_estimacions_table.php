<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('estimacions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('proyecto_id')
                ->constrained('proyectos')
                ->onDelete('cascade');

            $table->decimal('magnitud', 12, 4);

            $table->decimal('costo_materiales', 12, 2);

            $table->decimal('costo_mano_obra', 12, 2);

            $table->decimal('costo_total', 12, 2);

            $table->decimal('tiempo_estimado', 12, 4);

            $table->date('fecha');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('estimacions');
    }
};