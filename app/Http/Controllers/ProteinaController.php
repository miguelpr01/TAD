<?php

namespace App\Http\Controllers;

use App\Models\Proteina;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProteinaController extends Controller
{
    public function create(Request $request) {
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->imagen = $request->imagen;

        $proteina = new Proteina();
        $proteina->sabor = $request->sabor;
        $proteina->cantidad = $request->cantidad;

        $producto->proteina()->save($proteina);
        $producto->save();
        $proteina->save();

        return back() -> with('mensaje', 'Proteina agregada exitosamente.');
    }

    public function read($id) {
        $proteina = Proteina::findOrFail($id);
        return view('??', compact('proteina'));
    }

    public function update(Request $request, $id) {
        $prot = Proteina::findOrFail( $id );
        $prot->sabor = $request->sabor;
        $prot->cantidad = $request->cantidad;

        $prod = $prot->producto()->first();
        $prod->nombre = $request->nombre;
        $prod->precio = $request->precio;
        $prod->imagen = $request->imagen;

        $prot->save();
        $prod->save();

        return back() -> with('mensaje','Proteina actualizada exitosamente.');
    }

    public function delete($id) {
        Proteina::findOrFail($id)->delete();
        return back();
    }

    public function all() {
        $proteinas = Proteina::all();
        return view('??', compact('proteinas'));
    }
}
