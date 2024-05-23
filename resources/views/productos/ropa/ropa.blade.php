@extends('template.main')
@section('title', 'Naturfit')

@section('contenido')
    {{-- Header Start --}}
    <section class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <a href="/">
                        <img src="{{ url('storage/images/logoWeb/logo_web.png') }}" alt="Logo" class="img-fluid">
                    </a>
                </div>
                <div class="col-md-8 d-flex justify-content-end">
                    @if (Route::has('login'))
                        @guest
                            <button id="dropdownMenuLink" data-bs-toggle="dropdown" type="submit"
                                class="btn btn-success me-2">Productos</button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li>
                                    <a class="dropdown-item text-success"
                                        href="{{ route('producto.listaproteinas') }}">Proteína</a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-success"
                                        href="{{ route('producto.listacreatinas') }}">Creatina</a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-success" href="{{ route('producto.listaropas') }}">Ropa</a>
                                </li>
                            </ul>
                        @endguest
                        @auth
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
                                <button id="dropdownMenuLink" data-bs-toggle="dropdown" type="submit"
                                    class="btn btn-success me-2">{{ Auth::user()->nombre }}</button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                    </form>
                                    <li>
                                        <a class="dropdown-item text-success" href="{{ route('index.index') }}">Home</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-success"
                                            href="{{ route('ver_todos_pedidos') }}">Pedidos</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-success"
                                            href="{{ route('wishlist.productos_favoritos') }}">Productos favoritos</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-success" href="#"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                    </li>
                                </ul>
                            @elseif (Auth::user()->rol_id == 2)
                                <a href="{{ route('wishlist.wishlist') }}">
                                    <img src="{{ url('storage/images/icons/wishlist.png') }}" alt="wishlist"
                                        class="img-fluid carrito">
                                </a>
                                <a href="/">
                                    <img src="{{ url('storage/images/icons/carrito-de-compras.png') }}" alt="carrito"
                                        class="img-fluid carrito">
                                </a>
                                <button id="dropdownMenuLink" data-bs-toggle="dropdown" type="submit"
                                    class="btn btn-success me-2">Productos</button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li>
                                        <a class="dropdown-item text-success"
                                            href="{{ route('producto.listaproteinas') }}">Proteína</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-success"
                                            href="{{ route('producto.listacreatinas') }}">Creatina</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-success"
                                            href="{{ route('producto.listaropas') }}">Ropa</a>
                                    </li>
                                </ul>
                                <button id="dropdownMenuLink" data-bs-toggle="dropdown" type="submit"
                                    class="btn btn-success me-2">{{ Auth::user()->nombre }}</button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                    </form>
                                    <li>
                                        <a class="dropdown-item text-success" href="{{ route('index.index') }}">Home</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-success" href="{{ route('ver_pedidos') }}">Pedidos</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-success" href="#"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                    </li>
                                </ul>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="btn btn-success me-2">Iniciar sesión</a>
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

    <section class="section-lista-proteinas" id="proteinas">
        <div class="container">
            @if (session('mensaje'))
                <div class="message-created-note alert alert-info" role="alert">
                    {{ session('mensaje') }}
                </div>
            @endif

            {{-- Seccion de la lista de proteinas Start --}}
            <section class="seccion-lista-proteinas mb-5">
                <div class="container">
                    <h1 class="titulo">Lista de Ropas</h1>
                    <div class="py-4">
                        <form action="{{ route('nuevo_producto', 'ropa') }}" method="GET">
                            <button type="submit" class="btn btn-success btn-block">Añadir ropa</button>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">Imagen</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Precio</th>
                                    <th class="text-center">Talla</th>
                                    <th class="text-center">Color</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ropas as $ropa)
                                    <tr>
                                        <td>
                                            <div class="image-container text-center">
                                                <img src="{{ $ropa->producto->imagen }}"
                                                    alt="{{ $ropa->producto->nombre }}" class="img-thumbnail">
                                            </div>
                                        </td>
                                        <td class="align-middle text-center">{{ $ropa->producto->nombre }}</td>
                                        <td class="align-middle text-center">{{ $ropa->producto->precio }}</td>
                                        <td class="align-middle text-center">{{ $ropa->talla }}</td>
                                        <td class="align-middle text-center">{{ $ropa->color }}</td>
                                        <td class="align-middle text-center">
                                            <form action="{{ route('editar_ropa', $productos[$ropa->producto_id]->id) }}"
                                                method="GET">
                                                <button type="submit" class="btn btn-success btn-block">Editar</button>
                                            </form>
                                        </td>
                                        <td class="align-middle text-center">
                                            <form
                                                action="{{ route('borrar_producto', $productos[$ropa->producto_id]->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-success btn-block">Borrar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
            {{-- Seccion de la lista de proteinas End --}}

        </div>
    </section>
@endsection
