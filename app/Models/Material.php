<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\TipoTrabajo;
use App\Models\Precio;

class Material extends Model
{
    protected $fillable = [
        'nombre',
        'unidad',
        'descripcion',
        'activo',
    ];

    protected $casts = [
        'activo' => 'boolean',
    ];

    public function tiposTrabajo(): BelongsToMany
    {
        return $this->belongsToMany(
            TipoTrabajo::class,
            'tipo_trabajo_material',
            'material_id',
            'tipo_trabajo_id'
        )->withPivot('rendimiento');
    }

    public function precios(): HasMany
    {
        return $this->hasMany(Precio::class, 'material_id');
    }
}