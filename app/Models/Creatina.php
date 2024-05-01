<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Creatina extends Model
{
    use HasFactory;

    protected $fillable = [
        'opcion',
    ];

    // Relacion 1:1 inversa Creatina<-Producto
    public function producto(){
        return $this->belongsTo('App\Models\Producto');
    }
}
