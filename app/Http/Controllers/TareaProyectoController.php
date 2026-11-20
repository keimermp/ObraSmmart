<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\TareaProyecto;
use App\Models\Estimacion;
use Illuminate\Http\Request;

class TareaProyectoController extends Controller
{
    /**
     * Mostrar el cronograma de un proyecto.
     */
    public function index($proyectoId)
    {
        $proyecto = Proyecto::where('usuario_id', auth()->id())
            ->with('tipoTrabajo')
            ->findOrFail($proyectoId);

        $tareas = $proyecto->tareas;

        // Obtener la última estimación del proyecto.
        $estimacion = Estimacion::where('proyecto_id', $proyecto->id)
            ->latest('id')
            ->first();

        // Duración estimada expresada en jornadas de 8 horas.
        $duracionEstimadaDias = $estimacion
            ? (float) $estimacion->tiempo_estimado
            : null;

        // Calcular avance general.
        $avanceGeneral = $tareas->count() > 0
            ? round($tareas->avg('porcentaje_avance'), 2)
            : 0;

        return view('proyectos.gantt', compact(
            'proyecto',
            'tareas',
            'avanceGeneral',
            'estimacion',
            'duracionEstimadaDias'
        ));
    }

    /**
     * Registrar una actividad.
     */
    public function guardar(Request $request, $proyectoId)
    {
        $proyecto = Proyecto::where('usuario_id', auth()->id())
            ->findOrFail($proyectoId);

        $datos = $request->validate([
            'nombre' => [
                'required',
                'string',
                'max:150'
            ],

            'descripcion' => [
                'nullable',
                'string'
            ],

            'fecha_inicio' => [
                'required',
                'date'
            ],

            'fecha_fin' => [
                'required',
                'date',
                'after_or_equal:fecha_inicio'
            ],

            'porcentaje_avance' => [
                'required',
                'numeric',
                'min:0',
                'max:100'
            ],
        ]);

        $avance = (float) $datos['porcentaje_avance'];

        $estado = $this->determinarEstado($avance);

        $orden = ($proyecto->tareas()->max('orden') ?? 0) + 1;

        $proyecto->tareas()->create([
            'nombre' => $datos['nombre'],
            'descripcion' => $datos['descripcion'] ?? null,
            'fecha_inicio' => $datos['fecha_inicio'],
            'fecha_fin' => $datos['fecha_fin'],
            'porcentaje_avance' => $avance,
            'estado' => $estado,
            'orden' => $orden,
        ]);

        return redirect()
            ->route('proyectos.gantt', $proyecto->id)
            ->with('success', 'Actividad registrada correctamente.');
    }

    /**
     * Actualizar una actividad.
     */
    public function actualizar(Request $request, $proyectoId, $tareaId)
    {
        $proyecto = Proyecto::where('usuario_id', auth()->id())
            ->findOrFail($proyectoId);

        $tarea = $proyecto->tareas()->findOrFail($tareaId);

        $datos = $request->validate([
            'nombre' => [
                'required',
                'string',
                'max:150'
            ],

            'descripcion' => [
                'nullable',
                'string'
            ],

            'fecha_inicio' => [
                'required',
                'date'
            ],

            'fecha_fin' => [
                'required',
                'date',
                'after_or_equal:fecha_inicio'
            ],

            'porcentaje_avance' => [
                'required',
                'numeric',
                'min:0',
                'max:100'
            ],
        ]);

        $avance = (float) $datos['porcentaje_avance'];

        $tarea->update([
            'nombre' => $datos['nombre'],
            'descripcion' => $datos['descripcion'] ?? null,
            'fecha_inicio' => $datos['fecha_inicio'],
            'fecha_fin' => $datos['fecha_fin'],
            'porcentaje_avance' => $avance,
            'estado' => $this->determinarEstado($avance),
        ]);

        return redirect()
            ->route('proyectos.gantt', $proyecto->id)
            ->with('success', 'Actividad actualizada correctamente.');
    }

    /**
     * Eliminar una actividad.
     */
    public function eliminar($proyectoId, $tareaId)
    {
        $proyecto = Proyecto::where('usuario_id', auth()->id())
            ->findOrFail($proyectoId);

        $tarea = $proyecto->tareas()->findOrFail($tareaId);

        $tarea->delete();

        return redirect()
            ->route('proyectos.gantt', $proyecto->id)
            ->with('success', 'Actividad eliminada correctamente.');
    }

    /**
     * Determinar estado según el porcentaje de avance.
     */
    private function determinarEstado(float $avance): string
    {
        if ($avance >= 100) {
            return 'COMPLETADA';
        }

        if ($avance > 0) {
            return 'EN_PROGRESO';
        }

        return 'PENDIENTE';
    }
}