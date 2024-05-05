<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function create(Request $request) {
        $pedido = new Pedido();
    }
}
