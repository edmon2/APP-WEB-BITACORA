<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Devolucion extends Model
{
    use HasFactory;
    protected $table = 'devoluciones';

    protected $fillable = [
        'id_equipo',
        'id_usuario',
        'observaciones',
    ];

    // Relación con Usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario')->withTrashed();
    }

    // Relación con Equipo
    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'id_equipo')->withTrashed();
    }
}
