<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proteina extends Model
{
    use HasFactory;

    protected $fillable = [
        'sabor',
        'cantidad',
        'producto_id',
    ];

    // Relacion 1:1 inversa Proteina<-Producto
    public function producto(){
        return $this->belongsTo('App\Models\Producto');
    }
}
