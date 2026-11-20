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
    Schema::create('tipo_trabajo_material', function (Blueprint $table) {
        $table->id();

        $table->foreignId('tipo_trabajo_id')
            ->constrained('tipo_trabajos')
            ->onDelete('cascade');

        $table->foreignId('material_id')
            ->constrained('materials')
            ->onDelete('cascade');

        $table->decimal('rendimiento', 12, 4);

        $table->timestamps();

        $table->unique(['tipo_trabajo_id', 'material_id']);
    });
}

    /**
     * Reverse the migrations.
     */
public function down(): void
{
    Schema::dropIfExists('tipo_trabajo_material');
}

};