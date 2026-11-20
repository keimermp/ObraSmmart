<?php

namespace App\Services;

use App\Models\Proyecto;
use App\Models\Estimacion;
use Illuminate\Support\Facades\DB;

class EstimacionService
{
    // Duración de una jornada laboral en horas.
    private const HORAS_POR_DIA = 8;

    public function calcular(Proyecto $proyecto): Estimacion
    {
        $tipoTrabajo = $proyecto->tipoTrabajo;

        // Calcular la magnitud del proyecto.
        $magnitud = match ($tipoTrabajo->tipo_magnitud) {
            'AREA_RECTANGULAR' => $proyecto->largo * $proyecto->ancho,
            'AREA_VERTICAL' => $proyecto->largo * $proyecto->alto,
            'VOLUMEN' => $proyecto->largo * $proyecto->ancho * $proyecto->alto,
            'LINEAL' => $proyecto->largo,
            default => throw new \Exception('Tipo de magnitud no válido.'),
        };

        // Obtener materiales activos.
        $materiales = $tipoTrabajo->materiales()
            ->where('materials.activo', true)
            ->get();

        return DB::transaction(function () use (
            $proyecto,
            $materiales,
            $magnitud,
            $tipoTrabajo
        ) {

            $estimacion = Estimacion::create([
                'proyecto_id' => $proyecto->id,
                'magnitud' => $magnitud,
                'costo_materiales' => 0,
                'costo_mano_obra' => 0,
                'costo_total' => 0,
                'tiempo_estimado' => 0,
                'fecha' => now()->toDateString(),
            ]);

            // Calcular costo de materiales.
            $costoMateriales = 0;

            foreach ($materiales as $material) {

                $rendimiento = $material->pivot->rendimiento;

                if ($rendimiento <= 0) {
                    continue;
                }

                $cantidad = $magnitud / $rendimiento;

                $precio = $material->precios()
                    ->where('actual', true)
                    ->first();

                if (!$precio) {
                    continue;
                }

                $subtotal = $cantidad * $precio->precio;

                $costoMateriales += $subtotal;

                $estimacion->detalles()->create([
                    'material_id' => $material->id,
                    'cantidad' => $cantidad,
                    'rendimiento' => $rendimiento,
                    'precio_unitario' => $precio->precio,
                    'subtotal' => $subtotal,
                ]);
            }

            // Calcular mano de obra.
            $costoManoObra =
                $magnitud * $tipoTrabajo->tarifa_mano_obra;

            // Calcular duración.
            $productividad = (float) $tipoTrabajo->productividad;

            if ($productividad <= 0) {
                throw new \Exception(
                    'La productividad debe ser mayor que cero.'
                );
            }

            if ($tipoTrabajo->unidad_tiempo === 'DIA') {

                // La productividad representa unidades por día.
                $tiempoEstimado = $magnitud / $productividad;

            } elseif ($tipoTrabajo->unidad_tiempo === 'HORA') {

                // La productividad representa unidades por hora.
                $tiempoEnHoras = $magnitud / $productividad;

                // Convertir horas a jornadas de 8 horas.
                $tiempoEstimado = $tiempoEnHoras / self::HORAS_POR_DIA;

            } else {

                throw new \Exception(
                    'La unidad de tiempo del tipo de trabajo no es válida.'
                );
            }

            // Calcular costo total.
            $costoTotal = $costoMateriales + $costoManoObra;

            // Guardar resultados.
            $estimacion->update([
                'costo_materiales' => $costoMateriales,
                'costo_mano_obra' => $costoManoObra,
                'costo_total' => $costoTotal,
                'tiempo_estimado' => $tiempoEstimado,
            ]);

            return $estimacion->fresh('detalles');
        });
    }
}