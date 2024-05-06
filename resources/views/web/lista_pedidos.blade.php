@extends('template.main')

@section('title', 'Naturfit')

@section('contenido')

    {{-- Header Start --}}
    <section class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <a href="" style="text-decoration: none; margin-right: 20px;">
                        <img src="{{ url('storage/images/logoWeb/logo_web.png') }}" alt="Logo" class="img-fluid">
                    </a>
                    @auth
                        @if (Route::has('login'))
                            @if (Auth::user()->rol_id == 1)
                                <button id="dropdownMenuLink" data-bs-toggle="dropdown" type="submit" 
                                    class="btn btn-success me-2">Productos</button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li>
                                        <a class="dropdown-item text-success" href="{{ route('ver_proteinas') }}">Proteína</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-success" href="{{ route('ver_creatinas') }}">Creatina</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-success" href="{{ route('ver_ropas') }}">Ropa</a>
                                    </li>
                                </ul>
                            @endif
                        @endif
                    @endauth
                </div>
                <div class="col-md-8 d-flex justify-content-end">
                    @if (Route::has('login'))
                        @auth
                            @if (Auth::user()->rol_id == 1)
                                <button id="dropdownMenuLink" data-bs-toggle="dropdown" type="submit"
                                    class="btn btn-success me-2">{{ Auth::user()->nombre }}</button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <li>
                                        <a class="dropdown-item text-success" href="{{ route('index.index') }}">Home</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-success" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                        </a>
                                    </li>
                                </ul>
                            @endif
                        @else
                            <a href="{{ 'login' }}" class="btn btn-success me-2">Iniciar sesión</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-success">Registro</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </section>
    {{-- Header End --}}

    {{-- Sección de la lista de productos Start --}}
    <section class="section-lista-productos" id="productos">
        <div class="container">
            @if (session('mensaje_modificar_estado'))
                <div class="message-created-note alert alert-success" role="alert">
                    {{ session('mensaje_modificar_estado') }}
                </div>
            @endif
            <h1 class="titulo">Lista de Pedidos</h1>
            <div class="row">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Cliente</th>
                            <th>Productos</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pedidos as $pedido)
                            <tr>
                                <td>{{ $pedido->id }}</td>
                                <td>{{ $pedido->user->nombre }}{{ " " }}{{ $pedido->user->apellidos }}</td>
                                <td>
                                    @foreach ($pedido->producto as $producto)
                                        <div>{{ $producto->nombre }}</div>
                                    @endforeach
                                </td>
                                <td>{{ $pedido->fechaPedido }}</td>
                                <form action="{{ route('editar_estado', $pedido->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <td>
                                        <input type="text" name="estadoPedido" id="estadoPedido" value="{{ $pedido->estadoPedido }}">
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-success me-2">Actualizar estado</button>
                                    </td>
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    {{-- Sección de la lista de productos End --}}

@endsection