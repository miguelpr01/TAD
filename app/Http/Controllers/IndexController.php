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
        $proteinas = Proteina::all();
        $creatinas = Creatina::all();
        $ropas = Ropa::all();
        $productos = [[$proteinas], [$creatinas], [$ropas]];


        return view("web.index", compact("productos"));
        //return gettype($productos);
        //return $productos[0][0][0];
    }
}
