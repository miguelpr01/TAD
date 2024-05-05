<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function all() {
        $usuario_id = auth()->user()->id;
        $pedidos = Pedido::where('user_id', $usuario_id)->get();

        return view('web.pedido', compact('pedidos'));
    }
}
