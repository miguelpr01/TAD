<?php

namespace App\Http\Controllers;

use App\Models\Direccione;
use App\Models\Pedido;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PedidoController extends Controller
{
    public function all() {
        $usuario_id = auth()->user()->id;
        $pedidos = Pedido::where('user_id', $usuario_id)
                    ->with('producto')
                    ->get();

        return view('web.pedido', compact('pedidos'));
    }

    public function create(Request $request) {
        $pedido = new Pedido();
    }

    public function comprar_ya(Request $request) {
        $validator = Validator::make($request->all(), [
            'cantidad' => 'required|integer|min:1',
        ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'La cantidad debe ser un número entero positivo mayor que 0.');
        }

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

        return back()->with('mensaje','Pedido realizado exitosamente.');
    }

    public function ver_todos_pedidos()
    {
        $pedidos = Pedido::all();
        return view('web.lista_pedidos', compact('pedidos')); 
    }

    public function modificar_estado(Request $request, $id) {
        $pedido = Pedido::findOrFail($id);
        $pedido->estadoPedido = $request->estadoPedido;

        $pedido->save();

        return back()->with('mensaje_modificar_estado','Estado del pedido modificado.');
    }
}
