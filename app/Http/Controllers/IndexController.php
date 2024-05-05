<?php

namespace App\Http\Controllers;

use App\Models\Creatina;
use App\Models\Producto;
use App\Models\Proteina;
use App\Models\Ropa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    public function index(){
        $proteinas = Proteina::take(2)->get();
        $creatinas = Creatina::take(2)->get();
        $ropas = Ropa::take(2)->get();
        $productos = [[$proteinas], [$creatinas], [$ropas]];

        return view("web.index", compact("productos"));
    }
}
