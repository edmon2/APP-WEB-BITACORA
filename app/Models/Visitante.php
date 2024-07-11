<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Visitante extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'visitors';

    protected $fillable = [
        'nombre_completo',
        'fecha_entrada',
        'no_identidad',
        'motivo_visita',
        'departamento',
        'hora_salida',
    ];
}
