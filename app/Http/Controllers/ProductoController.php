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
}
