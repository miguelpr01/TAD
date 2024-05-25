<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineaCompra extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pedido_id',
        'cantidad',
    ];

    // Relación 1:1 inversa Carrito<-Cliente
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function producto(){
        return $this->belongsTo('App\Models\Producto');
    }
}
