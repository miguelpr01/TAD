<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function create(Request $request) {
        $usuario = new User();
        $usuario->nombre = $request->nombre;
        $usuario->email = $request->email;
        $usuario->apellidos = $request->apellidos;
        $usuario->password = $request->password;
        $usuario->admin = false;

        $cliente = new Cliente();
        $cliente->username = $request->username;
        $cliente->telefono = $request->telefono;
        $cliente->fechaNacimiento = $request->fechaNacimiento;

        $usuario->cliente()->save($cliente);
        $usuario->save();
        $cliente->save();

        return back()->with('message', 'Cliente creado exitosamente');
    }

    public function read($id) {
        $cliente = Cliente::findOrFail($id);
        return view('??', compact('cliente'));
    }
    
    public function update(Request $request, $id) {
        $cliente = Cliente::findOrFail($id);
        $cliente->username = $request->username;
        $cliente->telefono = $request->telefono;
        $cliente->fechaNacimiento = $request->fechaNacimiento;

        $usuario = $cliente->user()->first();
        $usuario->nombre = $request->nombre;
        $usuario->email = $request->email;
        $usuario->apellidos = $request->apellidos;

        $cliente->save();
        $usuario->save();

        return back()->with('message','Cliente actualizado exitosamente');
    }

    public function delete($id) {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return back();
    }

    public function all() {
        $clientes = Cliente::all();
        return view('??', compact('clientes'));
    }
}
