<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VisitanteFab extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'visitorsfab';

    protected $fillable = [
        'nombre_completo',
        'fecha_entrada',
        'motivo_visita',
        'departamento',
        'casco',
        'lentes',
        'zapatos',
        'hora_salida',
    ];
}
