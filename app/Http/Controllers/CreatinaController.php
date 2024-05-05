<?php

namespace App\Http\Controllers;

use App\Models\Creatina;
use App\Http\Requests\StoreCreatinaRequest;
use App\Http\Requests\UpdateCreatinaRequest;
use App\Models\Producto;
use Illuminate\Http\Request;

class CreatinaController extends Controller
{
    public function create(Request $request) {
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->imagen = $request->imagen;

        $producto->save();

        $creatina = new Creatina();
        $creatina->opcion = $request->opcion;

        $producto->creatina()->save($creatina);

        $creatinas = Creatina::all();
        
        $productos = [];
        foreach ($creatinas as $creatina) {
            $producto = Producto::find($creatina->producto_id);
            $productos[$creatina->producto_id] = $producto;
        }
        
        return redirect()->route('ver_creatinas')->with('mensaje', 'Proteina agregada');
    }

    public function read($id) {
        $creatina = Creatina::findOrFail($id);
        return view('??', compact('creatina'));
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.creatina.editar_creatina', compact('producto'));
    }

    public function update(Request $request, $id) {
        $producto = Producto::findOrFail($id);
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->imagen = $request->imagen;

        $creatina = Creatina::where('producto_id', $id)->firstOrFail();
        $creatina->opcion = $request->opcion;

        $creatina->save();
        $producto->save();

        return redirect()->route('ver_creatinas')->with('mensaje', 'Creatina editada');
    }

    public function delete($id) {
        Creatina::findOrFail($id)->delete();
        return back();
    }

    public function all() {
        $creatinas = Creatina::all();
        
        $productos = [];
        foreach ($creatinas as $creatina) {
            $producto = Producto::find($creatina->producto_id);
            $productos[$creatina->producto_id] = $producto;
        }
        
        return view('productos.creatina.creatina', compact('creatinas', 'productos'));
    }
}
