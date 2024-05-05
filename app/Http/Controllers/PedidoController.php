<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use DateTime;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function create(Request $request) {
        $pedido = new Pedido();
    }

    public function compra_ya(Request $request) {
        $pedido = new Pedido();
        $pedido->fechaPedido = new DateTime('now');
    }
}
