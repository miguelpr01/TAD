@extends('template.main')

@section('title', 'Naturfit')

@section('contenido')

    {{-- Header Start --}}
    <section class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <a href="">
                        <img src="{{ url('storage/images/logoWeb/logo_web.png') }}" alt="Logo" class="img-fluid">
                    </a>
                </div>
                <div class="col-md-8 d-flex justify-content-end">
                    @if (Route::has('login'))
                        @auth
                            @if (Auth::user()->rol_id == 2)
                                <a href="/" style="margin-right: 20px;">
                                    <img src="{{ url('storage/images/icons/carrito-de-compras.png') }}" alt="carrito" class="img-fluid">
                                </a>
                            @endif
                            <button id="dropdownMenuLink" data-bs-toggle="dropdown" type="submit"
                                class="btn btn-success me-2">{{ Auth::user()->nombre }}</button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <li>
                                    <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                    </a>
                                </li>
                            </ul>
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


    {{-- Nav Start --}}
    <section class="btn-paginas" id="prodEspecificos">
        <div class="container-xl">
            <div class="row justify-content-center">
                <div class="col text-center">
                    <a href="" class="btn btn-success">Proteina</a>
                </div>
                <div class="col text-center">
                    <a href="" class="btn btn-success">Creatina</a>
                </div>
                <div class="col text-center">
                    <a href="" class="btn btn-success">Ropa</a>
                </div>
            </div>
        </div>
    </section>
    {{-- Nav End --}}

    {{-- Sección de la lista de productos Start --}}
    <section class="section-lista-productos" id="productos">
        <div class="container">
            <h1 class="text-center mb-5">Pedidos</h1>
            <div class="row">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Productos</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pedidos as $pedido)
                            <tr>
                                <td>{{ $pedido->id }}</td>
                                <td></td>
                                <td>{{ $pedido->fechaPedido }}</td>
                                <td>{{ $pedido->estadoPedido }}</td>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    {{-- Sección de la lista de productos End --}}

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
