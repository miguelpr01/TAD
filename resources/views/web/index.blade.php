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
                            @elseif (Auth::user()->rol_id == 2)
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
                                        <a class="dropdown-item text-success" href="{{ route('ver_todos_pedidos') }}">Pedidos</a>
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


    {{-- Nav Start --}}
    <section class="btn-paginas" id="prodEspecificos">
        <div class="container-xl">
            <div class="row justify-content-center">
                <div class="col text-center">
                    <a href="{{route('producto.listaproteinas')}}" class="btn btn-success">Proteina</a>
                </div>
                <div class="col text-center">
                    <a href="{{route('producto.listacreatinas')}}" class="btn btn-success">Creatina</a>
                </div>
                <div class="col text-center">
                    <a href="{{route('producto.listaropas')}}" class="btn btn-success">Ropa</a>
                </div>
            </div>
        </div>
    </section>
    {{-- Nav End --}}


    {{-- Carousel Start --}}
    <section class="section-carousel">
        <div class="container-fluid">
            <div id="carouselControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ url('storage/images/carousel_index/carousel1.jpg') }}" class="d-block w-100 img-fluid"
                            alt="Imagen Carousel 1">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ url('storage/images/carousel_index/carousel2.jpg') }}" class="d-block w-100 img-fluid"
                            alt="Imagen Carousel 2">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ url('storage/images/carousel_index/carousel3.jpg') }}" class="d-block w-100 img-fluid"
                            alt="Imagen Carousel 3">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselControls"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselControls"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
    {{-- Carousel End --}}

    {{-- Sección de la lista de productos Start --}}
    <section class="section-lista-productos" id="productos">
        <div class="container">
            <h1 class="text-center mb-5">Algunos productos</h1>
            <div class="row">
                @foreach ($productos as $categoria)
                    @foreach ($categoria as $producto)
                        @foreach ($producto as $elemento)
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 shadow-sm">
                                    <img src="{{ $elemento->producto->imagen }}" class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $elemento->producto->nombre }}</h5>
                                        <p class="card-text">{{ $elemento->producto->precio }}€</p>
                                        <form action="{{route('producto.seleccionarProducto', $elemento->producto->id)}}">
                                            <button type="submit" class="btn btn-success btn-block">Ver producto</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                @endforeach
            </div>
        </div>
    </section>
    {{-- Sección de la lista de productos End --}}

    {{-- Footer Start --}}
    <footer class="footer">
        <div class="container text-center">
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
                        <li><a href="#"><img src="{{ url('storage/images/icons/facebook.png') }}" alt=""></a></li>
                        <li><a href="#"><img src="{{ url('storage/images/icons/twitter.png') }}"  alt=""></a></li>
                        <li><a href="#"><img src="{{ url('storage/images/icons/instagram.png') }}" alt=""></a></li>
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