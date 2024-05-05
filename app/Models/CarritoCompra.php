<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarritoCompra extends Model
{
    use HasFactory;

    protected $fillable = [
        'cantProducto',
    ];

    // Relación 1:1 inversa Carrito<-Cliente
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    // Relación 1:M Carrito->Productos
    public function productos(){
        return $this->hasMany('App\Models\Producto');
    }
}
