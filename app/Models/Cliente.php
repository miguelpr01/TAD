<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'telefono',
        'fechaNacimiento',
    ];

    // Relación 1:1 inversa Cliente<-Usuario
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    // Relación 1:1 Cliente->Dirección
    public function direccion(){
        return $this->belongsTo('App\Models\Direccion');
    }

    // Relacion 1:1 Producto->Carrito
    public function carritocompra(){
        return $this->hasOne('App\Models\CarritoCompra');
    }

    public function pedidos(){
        return $this->hasMany('App\Models\Pedido');
    }

    public function direccionenvio(){
        return $this->hasOne('App\Models\DireccionEnvio');
    }
}
