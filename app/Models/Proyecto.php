<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Proyecto extends Model
{
    protected $fillable = [
        'usuario_id',
        'tipo_trabajo_id',
        'nombre',
        'descripcion',
        'largo',
        'ancho',
        'alto',
        'unidad_medida',
        'estado',
    ];

    protected $casts = [
        'largo' => 'decimal:4',
        'ancho' => 'decimal:4',
        'alto' => 'decimal:4',
    ];

    /**
     * Un proyecto pertenece a un usuario.
     */
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    /**
     * Un proyecto pertenece a un tipo de trabajo.
     */
    public function tipoTrabajo(): BelongsTo
    {
        return $this->belongsTo(TipoTrabajo::class, 'tipo_trabajo_id');
    }

    /**
     * Un proyecto tiene muchas estimaciones.
     */
    public function estimaciones(): HasMany
    {
        return $this->hasMany(Estimacion::class, 'proyecto_id');
    }

    /**
     * Un proyecto tiene muchas tareas.
     */
    public function tareas(): HasMany
    {
        return $this->hasMany(TareaProyecto::class, 'proyecto_id')
            ->orderBy('orden');
    }
}