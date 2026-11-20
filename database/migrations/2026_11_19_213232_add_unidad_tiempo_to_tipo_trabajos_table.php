<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tipo_trabajos', function (Blueprint $table) {
            $table->string('unidad_tiempo', 10)->nullable()->after('productividad');
        });
    }

    public function down(): void
    {
        Schema::table('tipo_trabajos', function (Blueprint $table) {
            $table->dropColumn('unidad_tiempo');
        });
    }
};