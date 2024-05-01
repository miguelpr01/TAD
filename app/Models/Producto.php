<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'precio',
        'imagen',
    ];

    // Relacion 1:1 Producto->Proteina
    public function proteina(){
        return $this->hasOne('App\Models\Proteina');
    }

    // Relacion 1:1 Producto->Creatina
    public function creatina(){
        return $this->hasOne('App\Models\Creatina');
    }

    // Relacion 1:1 Producto->Ropa
    public function ropa(){
        return $this->hasOne('App\Models\Ropa');
    }

    // Relacion M:1 Productos<-Carrito
    public function carritocompra(){
        return $this->belongsTo('App\Models\CarritoCompra');
    }

    public function pedidos(){
        return $this->hasMany('App\Models\Pedido');
    }
}
