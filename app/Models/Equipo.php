<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipo extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'equipos';

    protected $fillable = [
        'no_serie',
        'tipo_equipo',
        'id_usuario',
        'entregado',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario')->withTrashed();
    }
}
