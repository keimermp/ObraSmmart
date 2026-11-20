<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\TipoTrabajo;
use App\Services\EstimacionService;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LISTAR PROYECTOS
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $proyectos = Proyecto::with('tipoTrabajo')
            ->where('usuario_id', auth()->id())
            ->latest()
            ->get();

        return view('proyectos.index', compact('proyectos'));
    }


    /*
    |--------------------------------------------------------------------------
    | MOSTRAR FORMULARIO DE CREACIÓN
    |--------------------------------------------------------------------------
    */

    public function crear()
    {
        $tiposTrabajo = TipoTrabajo::where('activo', true)
            ->orderBy('nombre')
            ->get();

        return view('proyectos.crear', compact('tiposTrabajo'));
    }


    /*
    |--------------------------------------------------------------------------
    | MOSTRAR FORMULARIO DE EDICIÓN
    |--------------------------------------------------------------------------
    */

    public function editar($id)
    {
        $proyecto = Proyecto::where('usuario_id', auth()->id())
            ->findOrFail($id);

        $tiposTrabajo = TipoTrabajo::where('activo', true)
            ->orderBy('nombre')
            ->get();

        return view('proyectos.editar', compact(
            'proyecto',
            'tiposTrabajo'
        ));
    }


    /*
    |--------------------------------------------------------------------------
    | ACTUALIZAR PROYECTO
    |--------------------------------------------------------------------------
    */

    public function actualizar(Request $request, $id)
    {
        $proyecto = Proyecto::where('usuario_id', auth()->id())
            ->findOrFail($id);

        $datos = $request->validate([
            'tipo_trabajo_id' => ['required', 'exists:tipo_trabajos,id'],
            'nombre' => ['required', 'string', 'max:150'],
            'descripcion' => ['nullable', 'string'],
            'largo' => ['nullable', 'numeric', 'min:0'],
            'ancho' => ['nullable', 'numeric', 'min:0'],
            'alto' => ['nullable', 'numeric', 'min:0'],
            'unidad_medida' => ['required', 'string', 'max:10'],
        ]);

        $proyecto->update($datos);

        return redirect()
            ->route('proyectos.index')
            ->with('success', 'Proyecto actualizado correctamente.');
    }


    /*
    |--------------------------------------------------------------------------
    | ELIMINAR PROYECTO
    |--------------------------------------------------------------------------
    */

    public function eliminar($id)
    {
        $proyecto = Proyecto::where('usuario_id', auth()->id())
            ->findOrFail($id);

        $proyecto->delete();

        return redirect()
            ->route('proyectos.index')
            ->with('success', 'Proyecto eliminado correctamente.');
    }


    /*
    |--------------------------------------------------------------------------
    | GUARDAR PROYECTO Y GENERAR ESTIMACIÓN
    |--------------------------------------------------------------------------
    */

    public function guardar(
        Request $request,
        EstimacionService $estimacionService
    ) {
        $datos = $request->validate([
            'tipo_trabajo_id' => ['required', 'exists:tipo_trabajos,id'],
            'nombre' => ['required', 'string', 'max:150'],
            'descripcion' => ['nullable', 'string'],
            'largo' => ['nullable', 'numeric', 'min:0'],
            'ancho' => ['nullable', 'numeric', 'min:0'],
            'alto' => ['nullable', 'numeric', 'min:0'],
            'unidad_medida' => ['required', 'string', 'max:10'],
        ]);

        $datos['usuario_id'] = auth()->id();
        $datos['estado'] = 'ACTIVO';

        $proyecto = Proyecto::create($datos);

        $estimacion = $estimacionService->calcular($proyecto);

        return view('proyectos.resultado', compact(
            'proyecto',
            'estimacion'
        ));
    }


    /*
    |--------------------------------------------------------------------------
    | VER ÚLTIMA ESTIMACIÓN
    |--------------------------------------------------------------------------
    */

    public function verEstimacion($id)
    {
        $proyecto = Proyecto::with([
            'tipoTrabajo',
            'estimaciones.detalles.material'
        ])
        ->where('usuario_id', auth()->id())
        ->findOrFail($id);

        $estimacion = $proyecto->estimaciones()
            ->latest()
            ->firstOrFail();

        return view('proyectos.resultado', compact(
            'proyecto',
            'estimacion'
        ));
    }

    public function misEstimaciones()
{
    $estimaciones = \App\Models\Estimacion::with([
        'proyecto.tipoTrabajo',
        'detalles.material'
    ])
    ->whereHas('proyecto', function ($query) {
        $query->where('usuario_id', auth()->id());
    })
    ->latest()
    ->get();

    return view(
        'estimaciones.index',
        compact('estimaciones')
    );
}

    /*
    |--------------------------------------------------------------------------
    | GENERAR PRESUPUESTO
    |--------------------------------------------------------------------------
    */

    public function presupuesto($id)
    {
        $proyecto = Proyecto::with([
            'tipoTrabajo',
            'estimaciones.detalles.material'
        ])
        ->where('usuario_id', auth()->id())
        ->findOrFail($id);

        $estimacion = $proyecto->estimaciones()
            ->latest()
            ->firstOrFail();

        return view('proyectos.presupuesto', compact(
            'proyecto',
            'estimacion'
        ));
    }


    /*
    |--------------------------------------------------------------------------
    | HISTORIAL DE ESTIMACIONES
    |--------------------------------------------------------------------------
    */

    public function historialEstimaciones($id)
    {
        $proyecto = Proyecto::with([
            'tipoTrabajo',
            'estimaciones.detalles.material'
        ])
        ->where('usuario_id', auth()->id())
        ->findOrFail($id);

        $estimaciones = $proyecto->estimaciones()
            ->with('detalles.material')
            ->latest()
            ->get();

        return view('proyectos.historial', compact(
            'proyecto',
            'estimaciones'
        ));
    }
}