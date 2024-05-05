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
                        @auth
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


                            @if (Auth::user()->rol_id == 1)
                            <button id="dropdownMenuLink" data-bs-toggle="dropdown" type="submit"
                                class="btn btn-success me-2">Productos</button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li>
                                        <a class="dropdown-item text-success" href="{{ route('ver_proteinas') }}">Proteina</a>
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

<section class="section-lista-proteinas" id="proteinas">
    <div class="container">
        <h1 class="text-center mb-5">Proteinas</h1>
        @if (session('mensaje'))
            <div class="message-created-note alert alert-info" role="alert">
                {{ session('mensaje') }}
            </div>
         @endif
        <div class="py-12">
            <div>
                <div>
                    <form action="{{ route('nuevo_producto', 'proteina') }}" method="GET">
                        <button type="submit" class="btn btn-success btn-block">Añadir proteina</button>
                    </form>
                </div>
            </div>                        
        </div>
        <div class="row">
            @foreach ($proteinas as $proteina)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ $productos[$proteina->producto_id]->imagen }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $productos[$proteina->producto_id]->nombre }}</h5>
                            <p class="card-text">{{ $productos[$proteina->producto_id]->precio }}</p>
                            <a href="#" class="btn btn-success btn-block">Ver producto</a>
                            <form action="{{ route('editar_proteina', $productos[$proteina->producto_id]->id) }}" method="GET">
                                <button type="submit" class="btn btn-success btn-block">Editar</button>
                            </form>
                            <form action="{{ route('borrar_producto', $productos[$proteina->producto_id]->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-success btn-block">Borrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection