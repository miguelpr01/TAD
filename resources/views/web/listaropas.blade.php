@extends('template.main')

@section('title', 'Ropa')

@section('contenido')

    @include('includes.header')

    {{-- Seccion de la lista de proteinas Start --}}
    <section class="seccion-lista-proteinas mb-5">
        <div class="container">
            <h1 class="titulo">Lista de Ropa</h1>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">Imagen</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Precio</th>
                            <th class="text-center">Talla</th>
                            <th class="text-center">Color</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ropas as $ropa)
                            <tr>
                                <td>
                                    <div class="image-container text-center">
                                        <img src="{{ $ropa->producto->imagen }}" alt="{{ $ropa->producto->nombre }}"
                                            class="img-thumbnail">
                                    </div>
                                </td>
                                <td class="align-middle text-center">{{ $ropa->producto->nombre }}</td>
                                <td class="align-middle text-center">{{ $ropa->producto->precio }}</td>
                                <td class="align-middle text-center">{{ $ropa->talla }}</td>
                                <td class="align-middle text-center">{{ $ropa->color }}</td>
                                <td class="align-middle text-center">
                                    <form action="{{ route('producto.seleccionarProducto', $ropa->producto->id) }}">
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
