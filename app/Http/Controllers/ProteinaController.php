<?php

namespace App\Http\Controllers;

use App\Models\Proteina;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProteinaController extends Controller
{
    public function create(Request $request) {
        $prod_attr = [];
        $prod_attr[0] = $request->nombre;
        $prod_attr[1] = $request->precio;
        $prod_attr[2] = $request->imagen;
        $prod = Producto::create($prod_attr);

        $prot_attr = [];
        $prot_attr[0] = $prod->sabor;
        $prot_attr[1] = $prod->cantidad;
        $proteina = Proteina::create($prot_attr);

        $prod->proteina()->save($proteina);
        $prod->save();
        $proteina->save();

        return back() -> with('mensaje', 'Proteina agregada exitosamente.');
    }

    public function read($id) {
        $proteina = Proteina::findOrFail($id);
        return view('??', compact('proteina'));
    }

    public function update(Request $request, $id) {
        $prod_attr = [];
        $prod_attr[0] = $request->nombre;
        $prod_attr[1] = $request->precio;
        $prod_attr[2] = $request->imagen;

        $prot_attr = [];
        $prot_attr[0] = $request->sabor;
        $prot_attr[1] = $request->cantidad;
        $prot = Proteina::findOrFail( $id );
        $prot->update( $prot_attr );

        $prod = $prot->producto();
        $prod->update( $prod_attr );

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
