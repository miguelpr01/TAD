<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Ropa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RopaController extends Controller
{
    public function create(Request $request) {
        $validator = Validator::make($request->all(), [
        'nombre' => 'required',
        'precio'=> 'required',
        'imagen'=> 'required',
        'talla'=> 'required',
        'color'=> 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'Datos inválidos.');
        }
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->imagen = $request->imagen;

        $producto->save();

        $ropa = new Ropa();
        $ropa->talla = $request->talla;
        $ropa->color = $request->color;

        $producto->proteina()->save($ropa);
    
        $ropas = Ropa::all();
        
        $productos = [];
        foreach ($ropas as $ropa) {
            $producto = Producto::find($ropa->producto_id);
            $productos[$ropa->producto_id] = $producto;
        }
        
        return redirect()->route('ver_ropas')->with('mensaje', 'Ropa agregada');
    }

    public function read($id) {
        $ropa = Ropa::findOrFail($id);
        return view('??', compact('ropa'));
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.ropa.editar_ropa', compact('producto'));
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'precio'=> 'required',
            'imagen'=> 'required',
            'talla'=> 'required',
            'color'=> 'required',
        ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'Datos inválidos.');
        }

        $producto = Producto::findOrFail($id);
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->imagen = $request->imagen;

        $ropa = Ropa::where('producto_id', $id)->firstOrFail();
        $ropa->talla = $request->talla;
        $ropa->color = $request->color;
        
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->imagen = $request->imagen;

        $ropa->save();
        $producto->save();
        
        return redirect()->route('ver_ropas')->with('mensaje', 'Ropa editada');
    }

    public function delete($id) {
        Ropa::findOrFail($id)->delete();
        return back();
    }

    public function all() {
        $ropas = Ropa::all();
        
        $productos = [];
        foreach ($ropas as $ropa) {
            $producto = Producto::find($ropa->producto_id);
            $productos[$ropa->producto_id] = $producto;
        }
        
        return view('productos.ropa.ropa', compact('ropas', 'productos'));
    }
}