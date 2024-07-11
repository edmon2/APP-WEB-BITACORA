<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',    
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

<<<<<<< HEAD
=======
    public function propietario()
    {
        return $this->belongsTo(Propietario::class, 'id_propietario')->withTrashed();
    }
>>>>>>> d2f29c56afedeae808201d395706ea3bb4bb7308

    //funcion que verificara si el usuario es de tipo Admin
    public function isAdminDC(){
        return $this->rol === 'AdminDataCenter';
    }
    public function isAdminFab(){
        return $this->rol === 'AdminFabrica';
    }
    public function isAdminLab(){
        return $this->rol === 'AdminLaboratorio';
    }
}
