<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inscripcion extends Model
{
    protected $table = 'inscripciones';

    protected $fillable = [
        'representante_id',
        'nombre',
        'apellido',
        'cedula',
        'grado',
        'curso',
        'fecha_inscripcion',
        'estado',
        'observaciones',
    ];

    public function representante(): BelongsTo
    {
        return $this->belongsTo(Representante::class, 'representante_id');
    }
}
