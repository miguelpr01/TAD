<?php

namespace App\Http\Controllers;

use App\Models\Creatina;
use App\Models\Proteina;
use App\Models\Ropa;
use Illuminate\Contracts\Session\Session;

class IndexController extends Controller
{
    public function index(){
        $proteinas = Proteina::take(2)->get();
        $creatinas = Creatina::take(2)->get();
        $ropas = Ropa::take(2)->get();
        $productos = [[$proteinas], [$creatinas], [$ropas]];

        return view("web.index", compact("productos"));
    }
    
    public function changeLocale($locale) {
        if (in_array($locale, ['es', 'en'])) { // Ensure this includes all your supported locales
            session()->put('locale', $locale);
            app()->setLocale($locale);
        }
        return redirect()->back();
    }
}
