@extends('template.main')
@section('title', 'Naturfit')

@section('contenido')
@include('includes.header')

    <section class="section-lista-proteinas" id="proteinas">
        <div class="container">
            @if (session('mensaje'))
                <div class="message-created-note alert alert-success" role="alert">
                    {{ session('mensaje') }}
                </div>
            @endif

            {{-- Seccion de la lista de proteinas Start --}}
            <section class="seccion-lista-proteinas mb-5">
                <div class="container">
                    <h1 class="titulo">Lista de Creatina</h1>
                    <div class="py-4">
                        <form action="{{ route('nuevo_producto', 'creatina') }}" method="GET">
                            <button type="submit" class="btn btn-success btn-block">Añadir creatina</button>
                        </form>
                    </div>
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
                                                <img src="{{ $creatina->producto->imagen }}"
                                                    alt="{{ $creatina->producto->nombre }}" class="img-thumbnail">
                                            </div>
                                        </td>
                                        <td class="align-middle text-center">{{ $creatina->producto->nombre }}</td>
                                        <td class="align-middle text-center">{{ $creatina->producto->precio }}</td>
                                        <td class="align-middle text-center">{{ $creatina->opcion }}</td>
                                        <td class="align-middle text-center">
                                            <form
                                                action="{{ route('editar_creatina', $productos[$creatina->producto_id]->id) }}"
                                                method="GET">
                                                <button type="submit" class="btn btn-success btn-block">Editar</button>
                                            </form>
                                        </td>
                                        <td class="align-middle text-center">
                                            <form
                                                action="{{ route('borrar_producto', $productos[$creatina->producto_id]->id) }}"
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
