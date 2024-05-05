@extends('template.main')

@section('titulo', 'Producto')

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
                            @if (Auth::user()->rol_id == 2)
                                <button id="dropdownMenuLink" data-bs-toggle="dropdown" type="submit" 
                                    class="btn btn-success me-2">Productos</button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li>
                                        <a class="dropdown-item text-success" href="{{route('producto.listaproteinas')}}">Proteína</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-success" href="{{route('producto.listacreatinas')}}">Creatina</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-success" href="{{route('producto.listaropas')}}">Ropa</a>
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
                                <a href="/" style="margin-right: 20px;">
                                    <img src="{{ url('storage/images/icons/carrito-de-compras.png') }}" alt="carrito" class="img-fluid">
                                </a>
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
                            @elseif (Auth::user()->rol_id == 2)
                                <a href="/" style="margin-right: 20px;">
                                    <img src="{{ url('storage/images/icons/carrito-de-compras.png') }}" alt="carrito" class="img-fluid">
                                </a>
                                <button id="dropdownMenuLink" data-bs-toggle="dropdown" type="submit"
                                    class="btn btn-success me-2">{{ Auth::user()->nombre }}</button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <li>
                                        <a class="dropdown-item text-success" href="{{ route('ver_pedidos') }}">Pedidos</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-success" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                        </a>
                                    </li>
                                </ul>
                            @endif

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
    <section>
        
        @php
            $producto = $datos['producto'];
        @endphp
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 my-3">
                    <img src="{{ $producto->imagen }}" alt="Imagen del producto" class="imagen-producto img-fluid">
                </div>
                <div class="col-md-6">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Nombre: </strong>{{ $producto->nombre }}</li>
                        <li class="list-group-item" ><strong>Precio: </strong>{{ $producto->precio }}</li>
                        @if (isset($producto->proteina))
                        <li class="list-group-item"><strong>Sabor: </strong>{{ $producto->proteina->sabor }}</li>
                        <li class="list-group-item"><strong>Cantidad (Kg): </strong>{{ $producto->proteina->cantidad }}</li>
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
                                
                                <div class="mb-3">
                                    <label for="cantidad" class="form-label"><strong>Cantidad del producto</strong></label>
                                    <input type="number" class="form-control" id="cantidad" name="cantidad" min="1" required>
                                </div>

                                @if (session('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                <div class="mb-3">
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

                                <button type="submit" class="btn btn-success btn-block">Comprar</button>
                            </form>
                        @else
                            <form action="{{ route('login') }}" class="needs-validation" novalidate>
                                @csrf
                                <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                                
                                <div class="mb-3">
                                    <label for="cantidad" class="form-label"><strong>Cantidad del producto</strong></label>
                                    <input type="number" class="form-control" id="cantidad" name="cantidad" min="1" required>
                                </div>

                                @if (session('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                <div class="mb-3">
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

                                <button type="submit" class="btn btn-success btn-block">Comprar</button>
                            </form>
                        @endauth

                    </ul>
                </div>
            </div>
        </div>
    </section>


    {{-- Información de producto End --}}

@endsection