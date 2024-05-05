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
                        @auth
                            <button id="dropdownMenuLink" data-bs-toggle="dropdown" type="submit"
                                class="btn btn-success me-2">{{ Auth::user()->nombre }}</button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li>
                                    <a class="dropdown-item text-success" href="">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="btn btn-success me-2">Logout</button>
                                        </form>
                                    </a>
                                </li>
                            </ul>

                            @if (Auth::user()->rol_id == 1)
                                <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                    aria-expanded="false">Productos</a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li>
                                        <a class="dropdown-item text-success" href="">Proteina</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-success" href="">Creatina</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-success" href="">Ropa</a>
                                    </li>
                                </ul>
                            @endif
                        @else
                            <a href="{{ '../login' }}" class="btn btn-success me-2">Iniciar sesión</a>
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
        @if (session('mensaje_error_autenticacion'))
            <div class="alert alert-danger" role="alert">
                {{ session('mensaje_error_autenticacion') }}
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
                            <li class="list-group-item"><strong>Cantidad: </strong>{{ $producto->proteina->cantidad }}</li>
                            <form action="{{ route('producto.comprobarautenticacion') }}" method="POST" class="mt-3">
                                @csrf
                                <div class="form-group">
                                    <label for="cantidad"><strong>Cantidad: </strong></label>
                                    <input type="number" name="cantidad" class="form-control" id="cantidad" placeholder="Cantidad" min="1">
                                </div>
                                <br>
                                <input type="hidden" value="{{$producto->id}}" name="producto_id">
                                <button type="submit" class="btn btn-success btn-block">Comprar</button>
                            </form>


                            Falta meter la cantidad del producto que se va a comprar, realizar la compra y ver si el usuario
                            esta registrado o no para hacer la compra
                        @elseif (isset($producto->creatina))
                            <li class="list-group-item"><strong>Opcion: </strong>{{ $producto->creatina->opcion }}</li>
                            <form action="{{ route('producto.comprobarautenticacion') }}">
                                <button type="submit" class="btn btn-success btn-block">Comprar</button>
                            </form>
                            Falta meter la cantidad del producto que se va a comprar, realizar la compra y ver si el usuario
                            esta registrado o no para hacer la compra
                        @elseif(isset($producto->ropa))
                            <li class="list-group-item"><strong>Talla: </strong>{{ $producto->ropa->talla }}</li>
                            <li class="list-group-item"><strong>Color: </strong>{{ $producto->ropa->color }}</li>
                            <form action="{{ route('producto.comprobarautenticacion') }}">
                                <button type="submit" class="btn btn-success btn-block">Comprar</button>
                            </form>
                            Falta meter la cantidad del producto que se va a comprar, realizar la compra y ver si el usuario
                            esta registrado o no para hacer la compra
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </section>


    {{-- Información de producto End --}}

    {{-- Footer Start --}}
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <p>Somos una tienda online de productos deportivos y de suplementación. Ofrecemos una amplia variedad de
                        artículos para ayudarte a alcanzar tus objetivos deportivos.</p>
                </div>
                <div class="col-md-4">
                    <h4>Menú</h4>
                    <ul>
                        <li><a href="#">Inicio</a></li>
                        <li><a href="#prodEspecificos">Productos específicos</a></li>
                        <li><a href="#productos">Productos</a></li>
                        <li><a href="#">Contacto</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h4>Redes sociales</h4>
                    <ul class="redes-sociales">
                        <li><a href="#"><img src="{{ url('storage/images/icons/facebook.png') }}" alt=""></a>
                        </li>
                        <li><a href="#"><img src="{{ url('storage/images/icons/twitter.png') }}" alt=""></a>
                        </li>
                        <li><a href="#"><img src="{{ url('storage/images/icons/instagram.png') }}"
                                    alt=""></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center copyright">
                    <p>&copy; 2024 Todos los derechos reservados.</p>
                </div>
            </div>
        </div>
    </footer>
    {{-- Footer End --}}
@endsection
