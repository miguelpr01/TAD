<?php

namespace App\Http\Controllers;

use App\Models\CarritoCompra;
use App\Models\Favorito;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CarritoController extends Controller
{
    public function carrito_compra()
    {
        $carritos = CarritoCompra::all()->where('user_id', Auth::user()->id);

        if (auth()->check()) {
            $idUser = auth()->user()->getAuthIdentifier();
            $user = User::findOrFail($idUser);
            $datos = [
                'carritos' => $carritos,
                'usuario' => $user
            ];
        } else {
            $datos = [
                'carritos' => $carritos
            ];
        }

        return view('web.carrito', compact('carritos', 'datos'));
    }

    public function agregar_producto(Producto $producto)
    {
        $existe = CarritoCompra::where('producto_id', $producto->id)
            ->where('user_id', Auth::user()->id)
            ->exists();

        if ($existe) {
            CarritoCompra::where('producto_id', $producto->id)
                ->where('user_id', Auth::user()->id)
                ->delete();
            session()->flash('existe', false);
            return back()->with('mensaje_quitar_fav', 'El producto ha sido eliminado del carrito');
        } else {
            $carrito = new CarritoCompra;
            $carrito->user_id = Auth::user()->id;
            $carrito->producto_id = $producto->id;
            $carrito->cantProducto = 1;
            $carrito->save();
            session()->flash('existe', true);
            return back()->with('mensaje_agregar_fav', 'El producto ha sido agregado al carrito');
        }
    }


    public function eliminar_producto($id)
    {
        $producto = CarritoCompra::where('producto_id', $id)->first();
        $producto->delete();
        return back()->with('mensaje_eliminar_prod_wishlist', 'Producto eliminado');
    }

    public function productos_carrito()
    {
        $productos = CarritoCompra::select('producto_id', DB::raw('count(*) as total'))->groupBy('producto_id')->get();
        return view('web.contadorfav', compact('productos'));
    }

    public function actualizar_cantidad(Request $request, $id)
    {
        $carrito = CarritoCompra::findOrFail($id);
        $carrito->cantProducto = $request->cantProducto;
        $carrito->save();
        return back();
    }
}
