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

    public function proteina(){
        return $this->hasOne('App\Models\Proteina');
    }

    public function creatina(){
        return $this->hasOne('App\Models\Creatina');
    }

    public function ropa(){
        return $this->hasOne('App\Models\Ropa');
    }

    public function carritocompra(){
        return $this->belongsTo('App\Models\CarritoCompra');
    }

    public function pedidos(){
        return $this->hasMany('App\Models\Pedido');
    }

    public function favoritos(){
        return $this->hasMany('App\Models\Favorito');
    }
}
