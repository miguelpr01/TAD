@extends('template.main')

@section('title', 'Creatina')

@section('contenido')

    @include('includes.header')

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

@endsection
