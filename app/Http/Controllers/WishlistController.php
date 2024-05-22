<?php

namespace App\Http\Controllers;

use App\Models\Favorito;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function wishlist()
    {
        $favoritos = Favorito::all()->where('user_id', Auth::user()->id);
        return view('web.wishlist', compact('favoritos'));
    }

    public function agregar_favorito(Producto $producto)
    {
        $existe = Favorito::where('producto_id', $producto->id)
            ->where('user_id', Auth::user()->id)
            ->exists();

        if ($existe) {
            Favorito::where('producto_id', $producto->id)
                ->where('user_id', Auth::user()->id)
                ->delete();
            session()->flash('existe', false);
            return back()->with('mensaje_quitar_fav', 'El producto ha sido eliminado de favoritos');
        } else {
            $favorito = new Favorito;
            $favorito->user_id = Auth::user()->id;
            $favorito->producto_id = $producto->id;
            $favorito->save();
            session()->flash('existe', true);
            return back()->with('mensaje_agregar_fav', 'El producto ha sido agregado a favoritos');
        }
    }


    public function eliminar_producto_wishlist($id)
    {
        $producto_favorito = Favorito::where('producto_id', $id)->first();
        $producto_favorito->delete();
        return back()->with('mensaje_eliminar_prod_wishlist', 'Producto eliminado');
    }
}
