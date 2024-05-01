<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    use HasFactory;

    protected $fillable = [
        'adminname'
    ];

    // Relación 1:1 inversa Administrador<-Usuario
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
