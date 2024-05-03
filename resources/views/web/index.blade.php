@extends('template.main')
@section('title', 'Naturfit')

@section('contenido')
    @guest
        <section class="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ url('storage/images/logoWeb/logo_web.png') }}" alt="Logo" class="img-fluid">
                    </div>
                    <div class="col-md-3 text-end">
                        <li class="nav-item justify-content-center d-flex">
                            <form action="{{ route('login') }}">
                                <button type="submit" class="btn btn-success me-2">Login</button>
                            </form>
                            <form action="{{ route('register') }}">
                                <button type="submit" class="btn btn-success">Registro</button>
                            </form>
                        </li>
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ url('storage/images/logoWeb/logo_web.png') }}" alt="Logo" class="img-fluid">
                        </div>
                        <div class="col-md-3 text-end">
                            <li class="nav-item justify-content-center d-flex"> 
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-success me-2">Logout</button>
                            </form>
                            </li>
                        </div>
                    </div>
                </div>
            </section>

        @if (Auth::user()->isAdmin())
            <!-- Admin -->
            <aside id="sidebar">
                <ul class="sidebar-nav">
                    <li class="sidebar-item">
                        <div class="dropdown">
                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">Productos</a>
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
                        </div>
                    </li>

                    <li class="sidebar-item">
                        <a href="{{ route('verclientes') }}" class="sidebar-link">Clientes</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="">Pedidos</a>
                    </li>
                </ul>
            </aside>
        @else
            <!-- Cliente -->
            {{-- Sección de la lista de productos Start --}}
            <section class="section-lista-productos">
                <div class="container">
                    <h1 class="text-center mb-5">Lista de productos</h1>
                    <div class="row">
                        @foreach ($productos as $categoria)
                            @foreach ($categoria as $producto)
                                @foreach ($producto as $elemento)
                                    <div class="col-md-4 mb-4">
                                        <div class="card h-100 shadow-sm">
                                            <img src="{{ $elemento->producto->imagen }}"
                                                class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    {{ $elemento->producto->nombre }}</h5>
                                                <p class="card-text">
                                                    {{ $elemento->producto->precio }}</p>
                                                <a href="#"
                                                    class="btn btn-primary btn-block">Comprar</a>
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
        @endif
    @endguest
@endsection