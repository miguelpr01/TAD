<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Proteina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProteinaController extends Controller
{
    public function create(Request $request) {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'precio'=> 'required',
            'imagen'=> 'required',
            'sabor'=> 'required',
            'cantidad'=> 'required',
        ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'Datos inválidos.');
        }

        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->imagen = $request->imagen;

        $producto->save();
    
        $proteina = new Proteina();
        $proteina->sabor = $request->sabor;
        $proteina->cantidad = $request->cantidad;
    
        $producto->proteina()->save($proteina);
    
        $proteinas = Proteina::all();
        
        $productos = [];
        foreach ($proteinas as $proteina) {
            $producto = Producto::find($proteina->producto_id);
            $productos[$proteina->producto_id] = $producto;
        }
        
        return redirect()->route('ver_proteinas')->with('mensaje', 'Proteina agregada');
    }    

    public function read($id) {
        $proteina = Proteina::findOrFail($id);
        return view('??', compact('proteina'));
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.proteina.editar_proteina', compact('producto'));
    }

    public function update(Request $request, $id) {
        $producto = Producto::findOrFail($id);
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->imagen = $request->imagen;

        $proteina = Proteina::where('producto_id', $id)->firstOrFail();
        $proteina->sabor = $request->sabor;
        $proteina->cantidad = $request->cantidad;

        $proteina->save();
        $producto->save();

        return redirect()->route('ver_proteinas')->with('mensaje', 'Proteina editada');
    }

    public function delete($id) {
        Proteina::findOrFail($id)->delete();
        return back();
    }

    public function all() {
        $proteinas = Proteina::all();
        
        $productos = [];
        foreach ($proteinas as $proteina) {
            $producto = Producto::find($proteina->producto_id);
            $productos[$proteina->producto_id] = $producto;
        }
        
        return view('productos.proteina.proteina', compact('proteinas', 'productos'));
    }
}
