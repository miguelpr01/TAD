@extends('template.main')

@section('title', 'Favoritos')

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
                                <a class="dropdown-item text-success" href="{{ route('producto.listaproteinas') }}">Proteína</a>
                            </li>
                            <li>
                                <a class="dropdown-item text-success" href="{{ route('producto.listacreatinas') }}">Creatina</a>
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
                                    <a class="dropdown-item text-success" href="{{ route('ver_todos_pedidos') }}">Pedidos</a>
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
                                <img src="{{ url('storage/images/icons/wishlist.png') }}" alt="wishlist" class="img-fluid carrito">
                            </a>
                            <a href="/">
                                <img src="{{ url('storage/images/icons/carrito-de-compras.png') }}" alt="carrito"
                                    class="img-fluid carrito">
                            </a>
                            <button id="dropdownMenuLink" data-bs-toggle="dropdown" type="submit"
                                class="btn btn-success me-2">Productos</button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li>
                                    <a class="dropdown-item text-success" href="{{ route('producto.listaproteinas') }}">Proteína</a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-success" href="{{ route('producto.listacreatinas') }}">Creatina</a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-success" href="{{ route('producto.listaropas') }}">Ropa</a>
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

{{-- Seccion de los productos en el carrito --}}
@if (session('mensaje_eliminar_prod_wishlist'))
    <div class="alert alert-success">
        {{ session('mensaje_eliminar_prod_wishlist') }}
    </div>
@endif
<section class="seccion-lista-proteinas">
    <div class="container mt-3">
        <h1 class="titulo">Carrito</h1>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-center">Imagen</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Precio</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carritos as $carrito)
                        <tr>
                            <td class="text-center">
                                <div class="image-container">
                                    <img src="{{ $carrito->producto->imagen }}" alt="{{ $carrito->producto->nombre }}"
                                        class="img-thumbnail">
                                </div>
                            </td>
                            <td class="align-middle text-center">{{ $carrito->producto->nombre }}</td>
                            <td class="align-middle text-center">{{ $carrito->producto->precio }}€</td>
                            <td class="align-middle text-center">
                                <form action="{{ route('carrito_compra.actualizar_cantidad', $carrito->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3 cantidad_producto">
                                        <label for="cantProducto" class="form-label"><strong>Cantidad del
                                                producto</strong></label>
                                        <input type="number" class="form-control" id="cantProducto" name="cantProducto"
                                            min="1" required value="{{ $carrito->cantProducto }}">
                                        <button type="submit" class="btn btn-primary mt-2">Actualizar</button>
                                    </div>
                                </form>
                            </td>
                            <td class="align-middle text-center">
                                <form action="{{route('producto.seleccionarProducto', $carrito->producto->id)}}">
                                    <button type="submit" class="btn btn-success btn-block">Ver producto</button>
                                </form>
                            </td>
                            <td class="align-middle text-center">
                                <form action="{{ route('carrito_compra.eliminar_producto', $carrito->producto->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-block">Borrar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

<form action="{{ route('pedido.comprar_carrito') }}" method="GET">
    @csrf
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

    <button type="submit" class="btn btn-success btn-block" {{ $carritos->isEmpty() ? 'disabled' : '' }}>Comprar</button>
</form>

{{-- Seccion de los productos en el carrito --}}

@endsection