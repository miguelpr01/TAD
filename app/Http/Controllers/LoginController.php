<?php

namespace App\Http\Controllers;

use App\Models\Direccion;
use App\Http\Requests\StoreDireccionRequest;
use App\Http\Requests\UpdateDireccionRequest;

class LoginController extends Controller
{
    public function redirect_login()
    {
        return view('auth.login');
    }

    public function redirect_register()
    {
        return view('auth.register');
    }
}
