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
                <h1 class="titulo">Lista de Proteínas</h1>
                <div class="py-4">
                    <form action="{{ route('nuevo_producto', 'proteina') }}" method="GET">
                        <button type="submit" class="btn btn-success btn-block">Añadir proteína</button>
                    </form>
                </div>
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
                                    <td>
                                        <div class="image-container text-center">
                                            <img src="{{ $proteina->producto->imagen }}" alt="{{ $proteina->producto->nombre }}"
                                                class="img-thumbnail" >
                                        </div>
                                    </td>
                                    <td class="align-middle text-center">{{ $proteina->producto->nombre }}</td>
                                    <td class="align-middle text-center">{{ $proteina->producto->precio }}</td>
                                    <td class="align-middle text-center">{{ $proteina->sabor }}</td>
                                    <td class="align-middle text-center">{{ $proteina->cantidad }}</td>
                                    <td class="align-middle text-center">
                                        <form action="{{ route('editar_proteina', $productos[$proteina->producto_id]->id) }}" method="GET">
                                            <button type="submit" class="btn btn-success btn-block">Editar</button>
                                        </form>
                                    </td>
                                    <td class="align-middle text-center">
                                        <form action="{{ route('borrar_producto', $productos[$proteina->producto_id]->id) }}" method="POST">
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