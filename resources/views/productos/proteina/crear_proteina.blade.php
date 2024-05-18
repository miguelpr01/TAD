@extends('template.main')
@section('title', 'Naturfit')

@section('contenido')
    {{-- Header Start --}}
    <section class="header py-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <a href="/">
                        <img src="{{ url('storage/images/logoWeb/logo_web.png') }}" alt="Logo" class="img-fluid">
                    </a>
                </div>
                <div class="col-md-8">
                    <div class="d-flex justify-content-end">
                        @if (Route::has('login'))
                            @auth
                                <div class="btn-group me-2">
                                    <button id="dropdownMenuLink" data-bs-toggle="dropdown" type="button"
                                        class="btn btn-success dropdown-toggle">Productos</button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <li><a class="dropdown-item text-success"
                                                href="{{ route('ver_proteinas') }}">Proteína</a></li>
                                        <li><a class="dropdown-item text-success"
                                                href="{{ route('ver_creatinas') }}">Creatina</a></li>
                                        <li><a class="dropdown-item text-success" href="{{ route('ver_ropas') }}">Ropa</a></li>
                                    </ul>
                                </div>
                                <div class="btn-group">
                                    <button id="dropdownMenuLinkUser" data-bs-toggle="dropdown" type="button"
                                        class="btn btn-success dropdown-toggle">{{ Auth::user()->nombre }}</button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLinkUser">
                                        <li><a class="dropdown-item text-success" href="{{ route('index.index') }}">Home</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item text-success" href="#"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
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
        </div>
    </section>
    {{-- Header End --}}

    {{-- Section Lista Proteínas Start --}}
    <section class="section-lista-proteinas py-5" id="proteinas">
        <div class="container">
            <h3 class="mb-4">Añadir proteína</h3>
            <form action="{{ route('confirmar_crear_proteina') }}" method="POST" id="proteina">
                @csrf
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio:</label>
                    <input type="number" name="precio" id="precio" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen:</label>
                    <input type="text" name="imagen" id="imagen" class="form-control" value="/storage/images/proteinas/nombreProducto.png">
                </div>
                <div class="mb-3">
                    <label for="sabor" class="form-label">Sabor:</label>
                    <input type="text" name="sabor" id="sabor" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="cantidad" class="form-label">Cantidad:</label>
                    <input type="text" name="cantidad" id="cantidad" class="form-control">
                </div>
                <button type="submit" class="btn btn-success me-2">Guardar</button>
                <a href="{{ route('ver_proteinas') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </section>
    {{-- Section Lista Proteínas End --}}
@endsection
