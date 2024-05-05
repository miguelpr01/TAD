<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccione extends Model
{
    use HasFactory;

    protected $fillable = [
        'calle',
        'numero',
        'piso',
        'puerta',
        'codPostal',
        'ciudad',
        'provincia',
        'pais',
        'user_id'
    ];

    // Relación 1:1 inversa Direccion<-Cliente
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function __toString(){
        return $this->calle . ', ' . $this->numero . ', ' . $this->ciudad;
    }
}
