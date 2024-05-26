<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'producto_id',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function producto(){
        return $this->belongsTo('App\Models\Producto');
    }
}
