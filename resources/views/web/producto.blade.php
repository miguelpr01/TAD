@extends('template.main')

@section('titulo', 'Producto')

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

    {{-- Información de producto Start --}}
    <section class="producto">
        @if (session('mensaje_error_autenticacion'))
            <div class="alert alert-danger" role="alert">
                {{ session('mensaje_error_autenticacion') }}
            </div>
        @endif

        @php
            $producto = $datos['producto'];
        @endphp
        @if (session('mensaje_agregar_fav'))
            <div class="alert alert-success" role="alert">
                {{ session('mensaje_agregar_fav') }}
            </div>
        @endif

        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 my-3">
                    <img src="{{ $producto->imagen }}" alt="Imagen del producto" class="imagen-producto img-fluid">
                </div>
                <div class="col-md-6">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Nombre: </strong>{{ $producto->nombre }}</li>
                        <li class="list-group-item"><strong>Precio: </strong>{{ $producto->precio }}</li>
                        @if (isset($producto->proteina))
                            <li class="list-group-item"><strong>Sabor: </strong>{{ $producto->proteina->sabor }}</li>
                            <li class="list-group-item"><strong>Cantidad (Kg):
                                </strong>{{ $producto->proteina->cantidad }}
                            </li>
                        @elseif (isset($producto->creatina))
                            <li class="list-group-item"><strong>Opcion: </strong>{{ $producto->creatina->opcion }}</li>
                        @elseif(isset($producto->ropa))
                            <li class="list-group-item"><strong>Talla: </strong>{{ $producto->ropa->talla }}</li>
                            <li class="list-group-item"><strong>Color: </strong>{{ $producto->ropa->color }}</li>
                        @endif

                        @if (session('mensaje'))
                            <div class="alert alert-success" role="alert">
                                {{ session('mensaje') }}
                            </div>
                        @endif

                        @auth
                            <form action="{{ route('pedido.comprar_ya') }}" class="needs-validation" novalidate>
                                @csrf
                                <input type="hidden" name="producto_id" value="{{ $producto->id }}">

                                <div class="mb-3 cantidad_producto">
                                    <label for="cantidad" class="form-label"><strong>Cantidad del producto</strong></label>
                                    <input type="number" class="form-control" id="cantidad" name="cantidad"
                                        min="1" required>
                                </div>

                                @if (session('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                <div class="mb-3 direccion_envio">
                                    <label for="direccion_id" class="form-label"><strong>Dirección de envío:</strong></label>
                                    <select class="form-select" id="direccion_id" name="direccion_id" required>
                                        @auth
                                            @foreach ($datos['usuario']->direccion as $direccion)
                                                <option value="{{ $direccion->id }}">{{ $direccion->__toString() }}</option>
                                            @endforeach
                                        @endauth
                                    </select>
                                    <div class="invalid-feedback">Por favor selecciona una dirección de envío.</div>
                                </div>

                                <button type="submit" class="btn btn-success btn-block boton_comprar_logado">Comprar</button>
                            </form>
                            <form action="{{ route('wishlist.agregar_favorito') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_usuario" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="id_producto" value="{{ $producto->id }}">
                                <button type="submit" class="btn btn-success btn-block mt-2 agregar_carrito">Añadir al
                                    carrito</button>
                            </form>
                        @else
                            <form action="{{ route('login') }}" class="needs-validation mt-4" novalidate>
                                @csrf
                                <input type="hidden" name="producto_id" value="{{ $producto->id }}">

                                <div class="mb-3 cantidad_producto">
                                    <label for="cantidad" class="form-label"><strong>Cantidad del producto</strong></label>
                                    <input type="number" class="form-control" id="cantidad" name="cantidad"
                                        min="1" required>
                                </div>

                                @if (session('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                <button type="submit"
                                    class="btn btn-success btn-block boton_comprar_sinlogar">Comprar</button>
                            </form>
                        @endauth

                    </ul>
                </div>
            </div>
        </div>
    </section>
    {{-- Información de producto End --}}

@endsection
