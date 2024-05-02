<?php

namespace App\Http\Controllers;

use App\Models\Direccion;
use App\Models\Cliente;
use Illuminate\Http\Request;

class DireccionController extends Controller
{
    public function create(Request $request) {
        $cliente = Cliente::findOrFail($request->cliente_id);

        $direccion = new Direccion();
        $direccion->calle = $request->calle;
        $direccion->numero = $request->numero;
        $direccion->piso = $request->piso;
        $direccion->puerta = $request->puerta;
        $direccion->codPostal = $request->codPostal;
        $direccion->ciudad = $request->ciudad;
        $direccion->provincia = $request->provincia;
        $direccion->pais = $request->pais;

        $cliente->direccion()->save($direccion);
        $cliente->save();
        $direccion->save();

        return back()->with("message","Direccion agregada exitosamente");
    }

    public function read($id) {
        $direccion = Direccion::findOrFail($id);
        return view("??", compact("direccion"));
    }

    public function update(Request $request, $id) {
        $direccion = Direccion::findOrFail($id);
        $direccion->calle = $request->calle;
        $direccion->numero = $request->numero;
        $direccion->piso = $request->piso;
        $direccion->puerta = $request->puerta;
        $direccion->codPostal = $request->codPostal;
        $direccion->ciudad = $request->ciudad;
        $direccion->provincia = $request->provincia;
        $direccion->pais = $request->pais;

        $direccion->save();
        return back()->with("message","Direccion actualizada exitosamente");
    }

    public function delete($id) {
        $direccion = Direccion::findOrFail($id);
        $direccion->delete();
        return back();
    }

    public function all() {
        $direcciones = Direccion::all();
        return view("??", compact("direcciones"));
    }
}
