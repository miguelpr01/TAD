<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'numPedido',
        'fechaPedido',
        'cantProducto',
        'estadoPedido',
        'direccionCliente',
    ];

    public function cliente(){
        return $this->belongsTo('App\Models\Cliente');
    }

    public function producto(){
        return $this->belongsTo('App\Models\Producto');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
