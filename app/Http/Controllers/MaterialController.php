<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
    {
        $materiales = Material::orderBy('nombre')->get();

        return view('materiales.index', compact('materiales'));
    }

    public function crear()
    {
        return view('materiales.crear');
    }

    public function guardar(Request $request)
    {
        $datos = $request->validate([
            'nombre' => ['required', 'string', 'max:150'],
            'unidad' => ['required', 'string', 'max:30'],
            'descripcion' => ['nullable', 'string'],
            'activo' => ['required', 'boolean'],
        ]);

        Material::create($datos);

        return redirect()
            ->route('materiales.index')
            ->with('success', 'Material registrado correctamente.');
    }

    public function editar($id)
    {
        $material = Material::findOrFail($id);

        return view('materiales.editar', compact('material'));
    }

    public function actualizar(Request $request, $id)
    {
        $material = Material::findOrFail($id);

        $datos = $request->validate([
            'nombre' => ['required', 'string', 'max:150'],
            'unidad' => ['required', 'string', 'max:30'],
            'descripcion' => ['nullable', 'string'],
            'activo' => ['required', 'boolean'],
        ]);

        $material->update($datos);

        return redirect()
            ->route('materiales.index')
            ->with('success', 'Material actualizado correctamente.');
    }

    public function cambiarEstado($id)
    {
        $material = Material::findOrFail($id);

        $material->update([
            'activo' => !$material->activo,
        ]);

        return redirect()
            ->route('materiales.index')
            ->with(
                'success',
                $material->activo
                    ? 'Material activado correctamente.'
                    : 'Material desactivado correctamente.'
            );
    }
}