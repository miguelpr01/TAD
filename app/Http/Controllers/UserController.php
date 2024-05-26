<?php

namespace App\Http\Controllers;

use App\Models\Direccione;
use App\Models\User;
use Illuminate\Http\Request;

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

    public function editar(Request $request)
    {
        $idUser = auth()->user()->getAuthIdentifier();
        $usuario = User::findOrFail($idUser);
        $direcc = Direccione::findOrFail($usuario->direccion()->first()->getAttribute('id'));

        $usuario->nombre = $request->nombre;
        $usuario->apellidos = $request->apellidos;
        // $usuario->email = $request->email;
        $usuario->telefono = $request->telefono;
        $usuario->fechaNacimiento = $request->fechaNacimiento;
        $usuario->save();

        $direcc->calle = $request->calle;
        $direcc->numero = $request->numero;
        $direcc->piso = $request->piso;
        $direcc->puerta = $request->puerta;
        $direcc->codPostal = $request->codPostal;
        $direcc->ciudad = $request->ciudad;
        $direcc->provincia = $request->provincia;
        $direcc->pais = $request->pais;
        $direcc->save();

        $success = 'Cambios guardados correctamente';
        
        $vars = [
            'usuario' => $usuario,
            'direcc' => $direcc,
            'success' => $success
        ];
        
        return view('web.userDetails', compact('vars'));
    }
}
