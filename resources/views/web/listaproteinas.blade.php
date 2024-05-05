@extends('template.main')

@section('title', 'Proteina')

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
    <section class="seccion-lista-proteinas">
        <div class="container mt-3">
            <h1 class="titulo">Lista de Proteínas</h1>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">Imagen</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Precio</th>
                            <th class="text-center">Sabor</th>
                            <th class="text-center">Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($proteinas as $proteina)
                            <tr>
                                <td class="align-middle text-center">
                                    <div class="image-container">
                                        <img src="{{ $proteina->producto->imagen }}" alt="{{ $proteina->producto->nombre }}"
                                            class="img-thumbnail">
                                    </div>
                                </td>
                                <td class="align-middle text-center">{{ $proteina->producto->nombre }}</td>
                                <td class="align-middle text-center">{{ $proteina->producto->precio }}</td>
                                <td class="align-middle text-center">{{ $proteina->sabor }}</td>
                                <td class="align-middle text-center">{{ $proteina->cantidad }}</td>
                                <td class="align-middle text-center">
                                    <form action="{{ route('producto.seleccionarProducto', $proteina->producto->id) }}">
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

@endsection
