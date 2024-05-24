<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarritoCompra extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'producto_id',
        'cantProducto',
    ];

    public function producto(){
        return $this->belongsTo('App\Models\Producto');
    }

    public function pedido(){
        return $this->belongsTo('App\Models\Pedido');
    }
}
