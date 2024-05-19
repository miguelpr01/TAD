<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'apellidos',
        'email',
        'password',
        'telefono',
        'fechaNacimiento',
        'rol_id',
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

    public function direccion(){
        return $this->hasMany('App\Models\Direccione');
    }

    public function rol(){
        return $this->belongsTo('App\Models\Role');
    }

    public function carritocompra(){
        return $this->hasOne('App\Models\CarritoCompra');
    }

    public function pedidos(){
        return $this->hasMany('App\Models\Pedido');
    }

    public function favorito(){
        return $this->hasOne('App\Models\Favorito');
    }
}
