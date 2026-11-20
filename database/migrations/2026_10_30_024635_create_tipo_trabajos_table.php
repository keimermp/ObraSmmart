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
    Schema::create('tipo_trabajos', function (Blueprint $table) {
        $table->id();
        $table->string('nombre', 150);
        $table->text('descripcion')->nullable();
        $table->enum('tipo_magnitud', [
            'AREA_RECTANGULAR',
            'AREA_VERTICAL',
            'VOLUMEN',
            'LINEAL'
        ]);
        $table->string('unidad_magnitud', 10);
        $table->decimal('tarifa_mano_obra', 12, 2);
        $table->decimal('productividad', 12, 4);
        $table->boolean('activo')->default(true);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
public function down(): void
{
    Schema::dropIfExists('tipo_trabajos');
}

};