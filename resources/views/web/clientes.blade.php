@extends('template.main')
@section('title', 'Naturfit')

@section('contenido')
<section class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="{{ url('storage/images/logoWeb/logo_web.png') }}" alt="Logo" class="img-fluid">
            </div>
            <div class="col-md-3 text-end">
                <li class="nav-item justify-content-center d-flex"> 
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-success me-2">Logout</button>
                    </form>
                </li>
            </div>
        </div>
    </div>
</section>
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
        <div class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
            <h1>Clientes</h1>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Email</th>
                        <th scope="col">Nombre de usuario</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Fecha de nacimiento</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientes as $cliente)
                    <tr>
                        <td scope="row">{{ $cliente->id }}</td>
                        <td scope="row">{{ $cliente->user->nombre }}</td>
                        <td scope="row">{{ $cliente->user->apellidos }}</td>
                        <td scope="row">{{ $cliente->user->email }}</td>
                        <td>{{ $cliente->username }}</td>
                        <td>{{ $cliente->telefono }}</td>
                        <td>{{ \Carbon\Carbon::parse($cliente->fechaNacimiento)->format('Y-m-d') }}</td>
                        <td>
                            <form action="">
                                <button type="submit" class="rounded">Editar</button>
                            </form>
                            <form action="" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="rounded">Borrar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection