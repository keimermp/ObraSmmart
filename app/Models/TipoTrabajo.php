<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoTrabajo extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'tipo_magnitud',
        'unidad_magnitud',
        'tarifa_mano_obra',
        'productividad',
        'unidad_tiempo',
        'activo',
    ];

    protected $casts = [
        'tarifa_mano_obra' => 'decimal:2',
        'productividad' => 'decimal:4',
        'activo' => 'boolean',
    ];

    public function materiales(): BelongsToMany
    {
        return $this->belongsToMany(
            Material::class,
            'tipo_trabajo_material',
            'tipo_trabajo_id',
            'material_id'
        )->withPivot('rendimiento');
    }

    public function proyectos(): HasMany
    {
        return $this->hasMany(Proyecto::class, 'tipo_trabajo_id');
    }
}