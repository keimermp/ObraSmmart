<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detalle_estimacions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('estimacion_id')
                ->constrained('estimacions')
                ->onDelete('cascade');

            $table->foreignId('material_id')
                ->constrained('materials')
                ->onDelete('restrict');

            $table->decimal('cantidad', 12, 4);

            $table->decimal('rendimiento', 12, 4);

            $table->decimal('precio_unitario', 12, 2);

            $table->decimal('subtotal', 12, 2);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detalle_estimacions');
    }
};