<?php

namespace App\Http\Controllers;

use App\Models\Creatina;
use App\Models\Producto;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use App\Models\Proteina;
use App\Models\Ropa;
use GuzzleHttp\Psr7\Request;
use PhpParser\Node\Expr\Cast\Object_;

class ProductoController extends Controller
{
    public function seleccionarProducto($id)
    {
        $producto = Producto::findOrFail($id);
        return view('web.producto', compact('producto'));
    }

    public function comprobarautenticacion(){
        return "Hola";
    }
}
