<?php

namespace App\Http\Controllers;

use App\Models\Creatina;
use App\Models\Producto;
use Illuminate\Http\Request;

class CreatinaController extends Controller
{
    public function create(Request $request) {
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->imagen = $request->imagen;

        $creatina = new Creatina();
        $creatina->opcion = $request->opcion;

        $producto->creatina()->save($creatina);
        $producto->save();
        $creatina->save();

        return back() -> with('mensaje', 'Creatina agregada exitosamente.');
    }

    public function read($id) {
        $creatina = Creatina::findOrFail($id);
        return view('??', compact('creatina'));
    }

    public function update(Request $request, $id) {
        $creatina = Creatina::findOrFail($id);
        $creatina->opcion = $request->opcion;

        $prod = $creatina->producto()->first();
        $prod->nombre = $request->nombre;
        $prod->precio = $request->precio;
        $prod->imagen = $request->imagen;

        $prod->save();
        $creatina->save();

        return back() -> with('mensaje','Creatina actualizada exitosamente.');
    }

    public function delete($id) {
        Creatina::findOrFail($id)->delete();
        return back();
    }

    public function all() {
        $creatinas = Creatina::all();
        return view('??', compact('creatinas'));
    }
}
