<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Models\User;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    public function create(Request $request) {
        $usuario = new User();
        $usuario->nombre = $request->nombre;
        $usuario->email = $request->email;
        $usuario->apellidos = $request->apellidos;
        $usuario->password = $request->password;
        $usuario->admin = false;

        $admin = new Administrador();
        $admin->adminname = $request->adminname;

        $usuario->administrador()->save($admin);
        $usuario->save();
        $admin->save();

        return back()->with('message', 'Admin creado exitosamente');
    }

    public function read($id) {
        $admin = Administrador::findOrFail($id);
        return view('??', compact('admin'));
    }

    public function update(Request $request, $id) {
        $admin = Administrador::findOrFail($id);
        $admin->adminname = $request->adminname;

        $usuario = $admin->user;
        $usuario->nombre = $request->nombre;
        $usuario->email = $request->email;
        $usuario->apellidos = $request->apellidos;

        $admin->save();
        $usuario->save();
    }
}
