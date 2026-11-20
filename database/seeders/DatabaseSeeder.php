<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'nombre' => 'Administrador',
                'descripcion' => 'Administrador del sistema',
                'activo' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Usuario',
                'descripcion' => 'Usuario del sistema',
                'activo' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        $this->call(AdminSeeder::class);
    }

}