<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\TipoTrabajo;
use Illuminate\Http\Request;

class TipoTrabajoController extends Controller
{
    /**
     * Mostrar todos los tipos de trabajo.
     */
    public function index()
    {
        $tiposTrabajo = TipoTrabajo::with('materiales')
            ->orderBy('nombre')
            ->get();

        return view(
            'tipos_trabajos.index',
            compact('tiposTrabajo')
        );
    }

    /**
     * Mostrar formulario para crear un tipo de trabajo.
     */
    public function crear()
    {
        $materiales = Material::where('activo', true)
            ->orderBy('nombre')
            ->get();

        return view(
            'tipos_trabajos.crear',
            compact('materiales')
        );
    }

    /**
     * Guardar un nuevo tipo de trabajo.
     */
    public function guardar(Request $request)
    {
        // Filtrar únicamente los materiales seleccionados.
        $materialesRecibidos = $request->input('materiales', []);

        $materialesSeleccionados = [];

        foreach ($materialesRecibidos as $material) {
            if (
                isset($material['id']) &&
                !empty($material['id'])
            ) {
                $materialesSeleccionados[] = $material;
            }
        }

        $request->merge([
            'materiales' => $materialesSeleccionados
        ]);

        // Validación.
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

            'tipo_magnitud' => [
                'required',
                'in:AREA_RECTANGULAR,AREA_VERTICAL,VOLUMEN,LINEAL'
            ],

            'unidad_magnitud' => [
                'required',
                'string',
                'max:10'
            ],

            'tarifa_mano_obra' => [
                'required',
                'numeric',
                'min:0'
            ],

            'productividad' => [
                'required',
                'numeric',
                'gt:0'
            ],

            'unidad_tiempo' => [
                'required',
                'in:DIA,HORA'
            ],

            'activo' => [
                'required',
                'boolean'
            ],

            'materiales' => [
                'nullable',
                'array'
            ],

            'materiales.*.id' => [
                'required',
                'exists:materials,id'
            ],

            'materiales.*.rendimiento' => [
                'required',
                'numeric',
                'gt:0'
            ],
        ]);

        // Crear tipo de trabajo.
        $tipoTrabajo = TipoTrabajo::create([

            'nombre' => $datos['nombre'],

            'descripcion' => $datos['descripcion'] ?? null,

            'tipo_magnitud' => $datos['tipo_magnitud'],

            'unidad_magnitud' => $datos['unidad_magnitud'],

            'tarifa_mano_obra' => $datos['tarifa_mano_obra'],

            'productividad' => $datos['productividad'],

            'unidad_tiempo' => $datos['unidad_tiempo'],

            'activo' => $datos['activo'],
        ]);

        // Preparar materiales.
        $materiales = [];

        if (!empty($datos['materiales'])) {

            foreach ($datos['materiales'] as $material) {

                $materiales[$material['id']] = [
                    'rendimiento' => $material['rendimiento'],
                ];
            }
        }

        // Asociar materiales.
        if (!empty($materiales)) {

            $tipoTrabajo
                ->materiales()
                ->attach($materiales);
        }

        return redirect()
            ->route('tipos-trabajo.index')
            ->with(
                'success',
                'Tipo de trabajo registrado correctamente.'
            );
    }

    /**
     * Mostrar formulario para editar un tipo de trabajo.
     */
    public function editar($id)
    {
        $tipoTrabajo = TipoTrabajo::with('materiales')
            ->findOrFail($id);

        $materiales = Material::where('activo', true)
            ->orderBy('nombre')
            ->get();

        return view(
            'tipos_trabajos.editar',
            compact(
                'tipoTrabajo',
                'materiales'
            )
        );
    }

    /**
     * Actualizar un tipo de trabajo.
     */
    public function actualizar(Request $request, $id)
    {
        $tipoTrabajo = TipoTrabajo::findOrFail($id);

        // Filtrar únicamente los materiales seleccionados.
        $materialesRecibidos = $request->input('materiales', []);

        $materialesSeleccionados = [];

        foreach ($materialesRecibidos as $material) {

            if (
                isset($material['id']) &&
                !empty($material['id'])
            ) {
                $materialesSeleccionados[] = $material;
            }
        }

        $request->merge([
            'materiales' => $materialesSeleccionados
        ]);

        // Validación.
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

            'tipo_magnitud' => [
                'required',
                'in:AREA_RECTANGULAR,AREA_VERTICAL,VOLUMEN,LINEAL'
            ],

            'unidad_magnitud' => [
                'required',
                'string',
                'max:10'
            ],

            'tarifa_mano_obra' => [
                'required',
                'numeric',
                'min:0'
            ],

            'productividad' => [
                'required',
                'numeric',
                'gt:0'
            ],

            'unidad_tiempo' => [
                'required',
                'in:DIA,HORA'
            ],

            'activo' => [
                'required',
                'boolean'
            ],

            'materiales' => [
                'nullable',
                'array'
            ],

            'materiales.*.id' => [
                'required',
                'exists:materials,id'
            ],

            'materiales.*.rendimiento' => [
                'required',
                'numeric',
                'gt:0'
            ],
        ]);

        // Actualizar información principal.
        $tipoTrabajo->update([

            'nombre' => $datos['nombre'],

            'descripcion' => $datos['descripcion'] ?? null,

            'tipo_magnitud' => $datos['tipo_magnitud'],

            'unidad_magnitud' => $datos['unidad_magnitud'],

            'tarifa_mano_obra' => $datos['tarifa_mano_obra'],

            'productividad' => $datos['productividad'],

            'unidad_tiempo' => $datos['unidad_tiempo'],

            'activo' => $datos['activo'],
        ]);

        // Preparar materiales.
        $materiales = [];

        if (!empty($datos['materiales'])) {

            foreach ($datos['materiales'] as $material) {

                $materiales[$material['id']] = [
                    'rendimiento' => $material['rendimiento'],
                ];
            }
        }

        // Sincronizar materiales.
        $tipoTrabajo
            ->materiales()
            ->sync($materiales);

        return redirect()
            ->route('tipos-trabajo.index')
            ->with(
                'success',
                'Tipo de trabajo actualizado correctamente.'
            );
    }

    /**
     * Activar o desactivar un tipo de trabajo.
     */
    public function cambiarEstado($id)
    {
        $tipoTrabajo = TipoTrabajo::findOrFail($id);

        $tipoTrabajo->update([
            'activo' => !$tipoTrabajo->activo,
        ]);

        return redirect()
            ->route('tipos-trabajo.index')
            ->with(
                'success',
                $tipoTrabajo->activo
                    ? 'Tipo de trabajo activado correctamente.'
                    : 'Tipo de trabajo desactivado correctamente.'
            );
    }
}