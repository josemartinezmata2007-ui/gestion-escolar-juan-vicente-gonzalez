<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Representante extends Model
{
    protected $table = 'representantes';

    protected $fillable = [
        'nombre',
        'apellido',
        'cedula',
        'telefono',
        'email',
        'direccion',
    ];

    public function inscripciones(): HasMany
    {
        return $this->hasMany(Inscripcion::class, 'representante_id');
    }
}
