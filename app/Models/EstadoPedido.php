<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoPedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'estado',
    ];

    public function pedido(){
        return $this->belongsTo('App\Models\Pedido');
    }
}
