<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DireccionEnvio extends Model
{
    use HasFactory;

    protected $fillable = [
        'numPedido',
    ];

    public function cliente(){
        return $this->belongsTo('App\Models\Cliente');
    }
}
