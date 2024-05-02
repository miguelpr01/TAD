<?php

namespace App\Http\Controllers;

use App\Models\Creatina;
use App\Models\Producto;
use Illuminate\Http\Request;

class CreatinaController extends Controller
{
    public function create(Request $request) {
        $prod_attr = [];
        $prod_attr[0] = $request->nombre;
        $prod_attr[1] = $request->precio;
        $prod_attr[2] = $request->imagen;
        $prod = Producto::create($prod_attr);

        $prot_attr = [];
        $prot_attr[0] = $prod->opcion;
        $proteina = Creatina::create($prot_attr);

        $prod->proteina()->save($proteina);
        $prod->save();
        $proteina->save();

        return back() -> with('mensaje', 'Creatina agregada exitosamente.');
    }

    public function read($id) {
        $creatina = Creatina::findOrFail($id);
        return view('??', compact('creatina'));
    }

    public function update(Request $request, $id) {
        $prod_attr = [];
        $prod_attr[0] = $request->nombre;
        $prod_attr[1] = $request->precio;
        $prod_attr[2] = $request->imagen;

        $prot_attr = [];
        $prot_attr[0] = $request->opcion;
        $prot = Creatina::findOrFail( $id );
        $prot->update( $prot_attr );

        $prod = $prot->producto();
        $prod->update( $prod_attr );

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
