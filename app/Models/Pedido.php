<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'fechaPedido',
        'estadoPedido',
        'direccionCliente',
    ];

    public function cliente(){
        return $this->belongsTo('App\Models\Cliente');
    }

    public function producto(){
        return $this->belongsToMany(Producto::class,'lineacompra','pedido_id','producto_id')
        ->withPivot('cantidad');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function lineacompra(){
        return $this->hasMany('App\Models\LineaCompra');
    }
}
