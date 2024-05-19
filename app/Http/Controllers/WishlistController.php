<?php

namespace App\Http\Controllers;

use App\Models\Favorito;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function wishlist(){
        $favoritos = Favorito::all();
        return view('web.wishlist', compact('favoritos'));
        // return $favoritos;
    }

    public function agregar_favorito(Request $request){
        $producto = Producto::findOrFail($request->id_producto);
        $user = User::findOrFail($request->id_usuario);
        $favorito = new Favorito;
        $favorito->user_id = $request->id_usuario;
        $favorito->producto_id = $request->id_producto;
        $favorito->save();
        return back()->with('mensaje_agregar_fav', 'El producto ha sido agregado a favoritos');
    }

    public function eliminar_producto_wishlist($id){
        $producto_favorito = Favorito::where('producto_id', $id)->first();
        $producto_favorito->delete();
        return back()->with('mensaje_eliminar_prod_wishlist', 'Producto eliminado');
    }
}
