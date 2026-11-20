<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetalleEstimacion extends Model
{
    protected $fillable = [
        'estimacion_id',
        'material_id',
        'cantidad',
        'rendimiento',
        'precio_unitario',
        'subtotal',
    ];

    protected $casts = [
        'cantidad' => 'decimal:4',
        'rendimiento' => 'decimal:4',
        'precio_unitario' => 'decimal:2',
        'subtotal' => 'decimal:2',
    ];

    public function estimacion(): BelongsTo
    {
        return $this->belongsTo(Estimacion::class, 'estimacion_id');
    }

    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class, 'material_id');
    }
}