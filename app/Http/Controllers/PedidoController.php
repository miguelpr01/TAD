<?php

namespace App\Http\Controllers;

use App\Models\Direccione;
use App\Models\Pedido;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function create(Request $request) {
        $pedido = new Pedido();
    }

    public function comprar_ya(Request $request) {
        $pedido = new Pedido();
        $pedido->fechaPedido = new DateTime('now');
        $pedido->estadoPedido = 'En proceso';
        $idUser = auth()->user()->getAuthIdentifier();
        $user = User::findOrFail($idUser);
        $direcc = Direccione::findOrFail($request->direccion_id);
        $pedido->direccionCliente = $direcc->__toString();
        $user->pedidos()->save($pedido);

        $pedido->producto()->sync([$request->producto_id => ['cantidad'=>$request->cantidad]]);
        
        $user->save();
        $pedido->save();

        return back()->with('success','aa');
    }
}
