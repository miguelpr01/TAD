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
                            @endif
                        @endif
                    @endauth
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
                                    <a class="dropdown-item text-success" href="{{ route('index.index') }}">Home</a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-success" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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

<section class="section-lista-creatinas" id="creatinas">
    <div class="container">
        <h3>Añadir creatina</h3>
            <form action="{{ route('confirmar_crear_creatina') }}" method="POST" id="creatina">
                @csrf
                <div class="mb-5">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre">
                    <br>
                    <label for="precio">Precio:</label>
                    <input type="number" name="precio" id="precio">
                    <br>
                    <label for="imagen">Imagen:</label>
                    <input type="text" name="imagen" id="imagen">
                    <br>
                    <label for="opcion">Opción:</label>
                    <input type="text" name="opcion" id="opcion">
                </div>
                <button type="submit" class="btn btn-success me-2">Guardar</button>
            </form>
            <form method="GET" action="{{ route('ver_creatinas') }}" class="max-w-sm mx-auto">
                <button type="submit" class="btn btn-success me-2">Cancelar</button>
            </form>
        </div>
    </div>
</section>
@endsection