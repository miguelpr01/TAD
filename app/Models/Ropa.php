<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ropa extends Model
{
    use HasFactory;

    protected $fillable = [
        'talla',
        'color',
        'producto_id',
    ];

    // Relacion 1:1 inversa Ropa<-Producto
    public function producto(){
        return $this->belongsTo('App\Models\Producto');
    }
}
