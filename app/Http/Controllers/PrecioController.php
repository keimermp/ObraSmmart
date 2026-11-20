<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Precio;
use Illuminate\Http\Request;

class PrecioController extends Controller
{
    public function index()
    {
        $precios = Precio::with('material')
            ->orderByDesc('fecha_inicio')
            ->get();

        return view('precios.index', compact('precios'));
    }

    public function crear()
    {
        $materiales = Material::where('activo', true)
            ->orderBy('nombre')
            ->get();

        return view('precios.crear', compact('materiales'));
    }

    public function guardar(Request $request)
    {
        $datos = $request->validate([
            'material_id' => ['required', 'exists:materials,id'],
            'precio' => ['required', 'numeric', 'min:0'],
            'fecha_inicio' => ['required', 'date'],
        ]);

        // Cuando se registra un nuevo precio,
        // el precio anterior deja de ser actual.
        Precio::where('material_id', $datos['material_id'])
            ->where('actual', true)
            ->update([
                'actual' => false,
                'fecha_fin' => $datos['fecha_inicio'],
            ]);

        Precio::create([
            'material_id' => $datos['material_id'],
            'precio' => $datos['precio'],
            'fecha_inicio' => $datos['fecha_inicio'],
            'fecha_fin' => null,
            'actual' => true,
        ]);

        return redirect()
            ->route('precios.index')
            ->with('success', 'Precio registrado correctamente.');
    }

    public function editar($id)
    {
        $precio = Precio::findOrFail($id);

        $materiales = Material::where('activo', true)
            ->orderBy('nombre')
            ->get();

        return view('precios.editar', compact(
            'precio',
            'materiales'
        ));
    }

    public function actualizar(Request $request, $id)
    {
        $precio = Precio::findOrFail($id);

        $datos = $request->validate([
            'material_id' => ['required', 'exists:materials,id'],
            'precio' => ['required', 'numeric', 'min:0'],
            'fecha_inicio' => ['required', 'date'],
        ]);

        $precio->update([
            'material_id' => $datos['material_id'],
            'precio' => $datos['precio'],
            'fecha_inicio' => $datos['fecha_inicio'],
        ]);

        return redirect()
            ->route('precios.index')
            ->with('success', 'Precio actualizado correctamente.');
    }
}