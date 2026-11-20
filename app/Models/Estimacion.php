<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\DetalleEstimacion;

class Estimacion extends Model
{
    protected $fillable = [
        'proyecto_id',
        'magnitud',
        'costo_materiales',
        'costo_mano_obra',
        'costo_total',
        'tiempo_estimado',
        'fecha',
    ];

    protected $casts = [
        'magnitud' => 'decimal:4',
        'costo_materiales' => 'decimal:2',
        'costo_mano_obra' => 'decimal:2',
        'costo_total' => 'decimal:2',
        'tiempo_estimado' => 'decimal:4',
        'fecha' => 'date',
    ];

    public function proyecto(): BelongsTo
    {
        return $this->belongsTo(Proyecto::class, 'proyecto_id');
    }

    public function detalles(): HasMany
{
    return $this->hasMany(DetalleEstimacion::class, 'estimacion_id');
}

}