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

    {{-- Edit Protein Section Start --}}
    <section class="section-lista-proteinas py-5" id="proteinas">
        <div class="container">
            <h3 class="mb-4">Editar proteína</h3>
            <form action="{{ route('confirmar_editar_proteina', $producto->id) }}" method="POST" id="proteina">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nombre" class="form-label"><strong>Nombre:</strong></label>
                    <input type="text" name="nombre" id="nombre" class="form-control"
                        value="{{ old('nombre', $producto->nombre) }}">
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label"><strong>Precio:</strong></label>
                    <input type="number" name="precio" id="precio" class="form-control"
                        value="{{ old('precio', $producto->precio) }}">
                </div>
                <div class="mb-3">
                    <label for="imagen" class="form-label"><strong>Imagen:</strong></label>
                    <input type="text" name="imagen" id="imagen" class="form-control"
                        value="{{ old('imagen', $producto->imagen) }}">
                </div>
                <div class="mb-3">
                    <label for="sabor" class="form-label"><strong>Sabor:</strong></label>
                    <input type="text" name="sabor" id="sabor" class="form-control"
                        value="{{ old('sabor', $producto->proteina->sabor) }}">
                </div>
                <div class="mb-4">
                    <label for="cantidad" class="form-label"><strong>Cantidad:</strong></label>
                    <input type="text" name="cantidad" id="cantidad" class="form-control"
                        value="{{ old('cantidad', $producto->proteina->cantidad) }}">
                </div>
                <button type="submit" class="btn btn-success me-2">Guardar</button>
                <a href="{{ route('ver_proteinas') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </section>
    {{-- Edit Protein Section End --}}
@endsection
