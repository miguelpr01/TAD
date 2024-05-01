<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    public function index(){
        $logo = Storage::url('images/logoWeb/logo_web.png');
        return view("web.index", compact("logo"));
    }
}
