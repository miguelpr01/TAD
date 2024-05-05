@extends('template.main')

@section('title', 'Creatina')

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
                            @if (Auth::user()->rol_id == 2)
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
                                        <a class="dropdown-item text-success" href="{{ route('ver_pedidos') }}">Pedidos</a>
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

    {{-- Seccion de la lista de proteinas Start --}}
    <section class="seccion-lista-proteinas mb-5">
        <div class="container text-center">
            <h1 class="titulo">Lista de Creatinas</h1>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">Imagen</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Precio</th>
                            <th class="text-center">Opción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($creatinas as $creatina)
                            <tr>
                                <td>
                                    <div class="image-container text-center">
                                        <img src="{{ $creatina->producto->imagen }}" alt="{{ $creatina->producto->nombre }}"
                                            class="img-thumbnail" >
                                    </div>
                                </td>
                                <td class="align-middle text-center">{{ $creatina->producto->nombre }}</td>
                                <td class="align-middle text-center">{{ $creatina->producto->precio }}</td>
                                <td class="align-middle text-center">{{ $creatina->opcion }}</td>
                                <td class="align-middle text-center">
                                    <form action="{{ route('producto.seleccionarProducto', $creatina->producto->id) }}">
                                        <button type="submit" class="btn btn-success btn-block">Ver producto</button>
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