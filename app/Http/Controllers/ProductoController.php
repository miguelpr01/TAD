<?php

namespace App\Http\Controllers;

use App\Models\Creatina;
use App\Models\Producto;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use App\Models\Proteina;
use App\Models\Ropa;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function seleccionarProducto($id)
    {
        $producto = Producto::findOrFail($id);
        return view('web.producto', compact('producto'));
    }

    public function comprobarautenticacion(Request $request){
         if(auth()->check()){
           return $request->cantidad;
         }else{
             return back()->with("mensaje_error_autenticacion","El usuario no esta logado");
         }
    }

    public function listaproteinas(){
        $proteinas = Proteina::all();
        return view('web.listaproteinas', compact('proteinas'));
    }

    public function listacreatinas(){
        $creatinas = Creatina::all();
        return view('web.listacreatinas', compact('creatinas'));
    }

    public function listaropas(){
        $ropas = Ropa::all();
        return view('web.listaropas', compact('ropas'));
    }
}
