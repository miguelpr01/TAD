<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Ropa;
use Illuminate\Http\Request;

class RopaController extends Controller
{
    public function create(Request $request) {
        $prod = new Producto();
        $prod->nombre = $request->nombre;
        $prod->precio = $request->precio;
        $prod->imagen = $request->imagen;

        $ropa = new Ropa();
        $ropa->talla = $request->talla;
        $ropa->color = $request->color;

        $prod->ropa()->save($ropa);
        $prod->save();
        $ropa->save();
        return back() -> with('mensaje','Ropa creada exitosamente.');
    }

    public function read($id) {
        $ropa = Ropa::findOrFail($id);
        return view('??', compact('ropa'));
    }

    public function update(Request $request, $id) {
        $ropa = Ropa::findOrFail($id);
        $ropa->talla = $request->talla;
        $ropa->color = $request->color;
        
        $prod = $ropa->producto()->first();
        $prod->nombre = $request->nombre;
        $prod->precio = $request->precio;
        $prod->imagen = $request->imagen;

        $ropa->save();
        $prod->save();

        return back() -> with('mensaje','Ropa actualizada exitosamente.');
    }

    public function delete($id) {
        Ropa::findOrFail($id)->delete();
        return back();
    }

    public function all() {
        $ropas = Ropa::all();
        return view('??', compact('ropas'));
    }
}
