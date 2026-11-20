<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\PrecioController;
use App\Http\Controllers\TipoTrabajoController;
use App\Http\Controllers\TareaProyectoController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Página principal
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


/*
|--------------------------------------------------------------------------
| Perfil del usuario
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});


/*
|--------------------------------------------------------------------------
| RUTAS PARA USUARIOS
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'usuario'])->group(function () {

    // PROYECTOS

    Route::get('/proyectos', [ProyectoController::class, 'index'])
        ->name('proyectos.index');

    Route::get('/proyectos/crear', [ProyectoController::class, 'crear'])
        ->name('proyectos.crear');

    Route::post('/proyectos', [ProyectoController::class, 'guardar'])
        ->name('proyectos.guardar');

    Route::get('/proyectos/{id}/editar', [ProyectoController::class, 'editar'])
        ->name('proyectos.editar');

    Route::put('/proyectos/{id}', [ProyectoController::class, 'actualizar'])
        ->name('proyectos.actualizar');

    Route::delete('/proyectos/{id}', [ProyectoController::class, 'eliminar'])
        ->name('proyectos.eliminar');


    // ESTIMACIONES

    Route::get('/proyectos/{id}/estimacion', [ProyectoController::class, 'verEstimacion'])
        ->name('proyectos.estimacion');

    Route::get('/proyectos/{id}/presupuesto', [ProyectoController::class, 'presupuesto'])
        ->name('proyectos.presupuesto');

    Route::get('/proyectos/{id}/historial', [ProyectoController::class, 'historialEstimaciones'])
        ->name('proyectos.historial');

    Route::get('/estimaciones', [ProyectoController::class, 'misEstimaciones'])
        ->name('estimaciones.index');


    // CRONOGRAMA Y DIAGRAMA DE GANTT

    Route::get('/proyectos/{proyectoId}/gantt', [TareaProyectoController::class, 'index'])
        ->name('proyectos.gantt');

    Route::post('/proyectos/{proyectoId}/tareas', [TareaProyectoController::class, 'guardar'])
        ->name('proyectos.tareas.guardar');

    Route::put('/proyectos/{proyectoId}/tareas/{tareaId}', [TareaProyectoController::class, 'actualizar'])
        ->name('proyectos.tareas.actualizar');

    Route::delete('/proyectos/{proyectoId}/tareas/{tareaId}', [TareaProyectoController::class, 'eliminar'])
        ->name('proyectos.tareas.eliminar');

});


/*
|--------------------------------------------------------------------------
| RUTAS PARA ADMINISTRADORES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {


    // MATERIALES

    Route::get('/materiales', [MaterialController::class, 'index'])
        ->name('materiales.index');

    Route::get('/materiales/crear', [MaterialController::class, 'crear'])
        ->name('materiales.crear');

    Route::post('/materiales', [MaterialController::class, 'guardar'])
        ->name('materiales.guardar');

    Route::get('/materiales/{id}/editar', [MaterialController::class, 'editar'])
        ->name('materiales.editar');

    Route::put('/materiales/{id}', [MaterialController::class, 'actualizar'])
        ->name('materiales.actualizar');

    Route::patch('/materiales/{id}/estado', [MaterialController::class, 'cambiarEstado'])
        ->name('materiales.estado');


    // PRECIOS

    Route::get('/precios', [PrecioController::class, 'index'])
        ->name('precios.index');

    Route::get('/precios/crear', [PrecioController::class, 'crear'])
        ->name('precios.crear');

    Route::post('/precios', [PrecioController::class, 'guardar'])
        ->name('precios.guardar');

    Route::get('/precios/{id}/editar', [PrecioController::class, 'editar'])
        ->name('precios.editar');

    Route::put('/precios/{id}', [PrecioController::class, 'actualizar'])
        ->name('precios.actualizar');


    // TIPOS DE TRABAJO

    Route::get('/tipos-trabajo', [TipoTrabajoController::class, 'index'])
        ->name('tipos-trabajo.index');

    Route::get('/tipos-trabajo/crear', [TipoTrabajoController::class, 'crear'])
        ->name('tipos-trabajo.crear');

    Route::post('/tipos-trabajo', [TipoTrabajoController::class, 'guardar'])
        ->name('tipos-trabajo.guardar');

    Route::get('/tipos-trabajo/{id}/editar', [TipoTrabajoController::class, 'editar'])
        ->name('tipos-trabajo.editar');

    Route::put('/tipos-trabajo/{id}', [TipoTrabajoController::class, 'actualizar'])
        ->name('tipos-trabajo.actualizar');

    Route::patch('/tipos-trabajo/{id}/estado', [TipoTrabajoController::class, 'cambiarEstado'])
        ->name('tipos-trabajo.estado');

});


/*
|--------------------------------------------------------------------------
| Autenticación
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';