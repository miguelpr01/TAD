<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;

class ProductoController extends Controller
{
    public function create($string)
    {
        if ($string == "proteina")
        {
            return view('productos.proteina.crear_proteina');
        }
        elseif ($string == "creatina")
        {
            return view('productos.creatina.crear_creatina');
        }
        elseif ($string == "ropa")
        {
            return view('productos.ropa.crear_ropa');
        }
    }

    public function delete($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return back()->with("mensaje", "Producto eliminado");
    }

    public function seleccionarProducto($id)
    {
        $producto = Producto::findOrFail($id);
        return view('web.producto', compact('producto'));
    }

    public function comprobar_autenticacion(){
        return "Hola";
    }
}
