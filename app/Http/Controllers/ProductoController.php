<?php

namespace App\Http\Controllers;

use App\Models\CarritoCompra;
use App\Models\Creatina;
use App\Models\Favorito;
use App\Models\Producto;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use App\Models\Proteina;
use App\Models\Ropa;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProductoController extends Controller
{
    public function create($string)
    {
        if ($string == "proteina") {
            return view('productos.proteina.crear_proteina');
        } elseif ($string == "creatina") {
            return view('productos.creatina.crear_creatina');
        } elseif ($string == "ropa") {
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

        if (auth()->check()) {
            $existe_favorito = Favorito::where('producto_id', $producto->id)
                ->where('user_id', Auth::user()->id)
                ->exists();

            $existe_carrito = CarritoCompra::where('producto_id', $producto->id)
                ->where('user_id', Auth::user()->id)
                ->exists();

            if ($existe_favorito) {
                session()->flash('existe_favorito', true);
            } else {
                session()->flash('existe_favorito', false);
            }

            if ($existe_carrito) {
                session()->flash('existe_carrito', true);
            } else {
                session()->flash('existe_carrito', false);
            }
        }

        if (auth()->check()) {
            $idUser = auth()->user()->getAuthIdentifier();
            $user = User::findOrFail($idUser);
            $datos = [
                'producto' => $producto,
                'usuario' => $user
            ];
        } else {
            $datos = [
                'producto' => $producto
            ];
        }

        return view('web.producto', compact('datos'));
    }

    public function comprobarautenticacion(Request $request)
    {
        if (auth()->check()) {
            return $request->cantidad;
        } else {
            return back()->with("mensaje_error_autenticacion", "El usuario no esta logado");
        }
    }

    public function listaproteinas()
    {
        $proteinas = Proteina::all();
        return view('web.listaproteinas', compact('proteinas'));
    }

    public function listacreatinas()
    {
        $creatinas = Creatina::all();
        return view('web.listacreatinas', compact('creatinas'));
    }

    public function listaropas()
    {
        $ropas = Ropa::all();
        return view('web.listaropas', compact('ropas'));
    }
}
