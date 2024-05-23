<?php

namespace App\Http\Controllers;

use App\Models\Direccione;
use App\Models\User;

class UserController extends Controller
{
    public function detalles()
    {
        $idUser = auth()->user()->getAuthIdentifier();
        $usuario = User::findOrFail($idUser);
        $direcc = $usuario->direccion()->first();
        $vars = [
            'usuario' => $usuario,
            'direcc' => $direcc
        ];
        return view('web.userDetails', compact('vars'));
    }
}
