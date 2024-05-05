<?php

namespace App\Http\Controllers;

use App\Models\Creatina;
use App\Models\Producto;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use App\Models\Proteina;
use App\Models\Ropa;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use PhpParser\Node\Expr\Cast\Object_;

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
        $idUser = auth()->user()->getAuthIdentifier();
        $user = User::findOrFail($idUser);

        $datos = [
            'producto' => $producto,
            'usuario' => $user
        ];
        return view('web.producto', compact('datos'));
    }

    public function comprobar_autenticacion(){
        return "Hola";
    }
}
