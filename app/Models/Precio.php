<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Precio extends Model
{
    protected $fillable = [
        'material_id',
        'precio',
        'fecha_inicio',
        'fecha_fin',
        'actual',
    ];

    protected $casts = [
        'precio' => 'decimal:2',
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
        'actual' => 'boolean',
    ];

    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class);
    }
}