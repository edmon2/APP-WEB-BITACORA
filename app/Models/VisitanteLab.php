<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VisitanteLab extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'visitorslab';

    protected $fillable = [
        'nombre_completo',
        'fecha_entrada',
        'motivo_visita',
        'departamento',
        'hora_salida',
    ];
}
