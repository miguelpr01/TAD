@extends('template.main')

@section('title', 'Proteina')

@section('contenido')

    @include('includes.header')

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
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($proteinas as $proteina)
                            <tr>
                                <td class="align-middle text-center">
                                    <div class="image-container">
                                        <img src="{{ $proteina->producto->imagen }}"
                                            alt="{{ $proteina->producto->nombre }}" class="img-thumbnail">
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
