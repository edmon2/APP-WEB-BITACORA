<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entrega extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'entregas';

    protected $fillable = [
        'id_equipo',
        'id_usuario',
        'fecha_entrega',
        'observaciones',
    ];


}
