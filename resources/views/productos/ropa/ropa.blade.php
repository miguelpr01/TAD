@extends('template.main')
@section('title', 'Naturfit')

@section('contenido')
@include('includes.header')

    <section class="section-lista-proteinas" id="proteinas">
        <div class="container">
            @if (session('mensaje'))
                <div class="message-created-note alert alert-info" role="alert">
                    {{ session('mensaje') }}
                </div>
            @endif

            {{-- Seccion de la lista de proteinas Start --}}
            <section class="seccion-lista-proteinas mb-5">
                <div class="container">
                    <h1 class="titulo">Lista de Ropas</h1>
                    <div class="py-4">
                        <form action="{{ route('nuevo_producto', 'ropa') }}" method="GET">
                            <button type="submit" class="btn btn-success btn-block">Añadir ropa</button>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">Imagen</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Precio</th>
                                    <th class="text-center">Talla</th>
                                    <th class="text-center">Color</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ropas as $ropa)
                                    <tr>
                                        <td>
                                            <div class="image-container text-center">
                                                <img src="{{ $ropa->producto->imagen }}"
                                                    alt="{{ $ropa->producto->nombre }}" class="img-thumbnail">
                                            </div>
                                        </td>
                                        <td class="align-middle text-center">{{ $ropa->producto->nombre }}</td>
                                        <td class="align-middle text-center">{{ $ropa->producto->precio }}</td>
                                        <td class="align-middle text-center">{{ $ropa->talla }}</td>
                                        <td class="align-middle text-center">{{ $ropa->color }}</td>
                                        <td class="align-middle text-center">
                                            <form action="{{ route('editar_ropa', $productos[$ropa->producto_id]->id) }}"
                                                method="GET">
                                                <button type="submit" class="btn btn-success btn-block">Editar</button>
                                            </form>
                                        </td>
                                        <td class="align-middle text-center">
                                            <form
                                                action="{{ route('borrar_producto', $productos[$ropa->producto_id]->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-success btn-block">Borrar</button>
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

        </div>
    </section>
@endsection
