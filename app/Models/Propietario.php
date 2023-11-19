<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Propietario extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'propietarios';

    protected $fillable = [
        'nombre_completo',
        'fecha_nacimiento',
        'no_identidad',
        'imagen',
        'direccion',
    ];
}
