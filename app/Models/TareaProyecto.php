<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TareaProyecto extends Model
{
    protected $table = 'tareas_proyecto';

    protected $fillable = [
        'proyecto_id',
        'nombre',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'porcentaje_avance',
        'estado',
        'orden',
    ];

    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
        'porcentaje_avance' => 'decimal:2',
    ];

    /**
     * Una tarea pertenece a un proyecto.
     */
    public function proyecto(): BelongsTo
    {
        return $this->belongsTo(Proyecto::class, 'proyecto_id');
    }
}