<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('precios', function (Blueprint $table) {
            $table->id();

            $table->foreignId('material_id')
                ->constrained('materials')
                ->onDelete('cascade');

            $table->decimal('precio', 12, 2);

            $table->date('fecha_inicio');

            $table->date('fecha_fin')->nullable();

            $table->boolean('actual')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('precios');
    }
};