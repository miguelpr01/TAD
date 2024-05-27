@extends('template.main')

@section('title', 'Favoritos')

@section('contenido')
    @include('includes.header')

    {{--  Seccion de los productos en la wishlist Start --}}
    @if (session('mensaje_eliminar_prod_wishlist'))
        <div class="alert alert-success">
            {{ session('mensaje_eliminar_prod_wishlist') }}
        </div>
    @endif
    <section class="seccion-lista-proteinas">
        <div class="container mt-3">
            <h1 class="titulo">Favoritos</h1>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">Imagen</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Precio</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($favoritos as $favorito)
                            <tr>
                                <td class="text-center">
                                    <div class="image-container">
                                        <img src="{{ $favorito->producto->imagen }}"
                                            alt="{{ $favorito->producto->nombre }}" class="img-thumbnail">
                                    </div>
                                </td>
                                <td class="align-middle text-center">{{ $favorito->producto->nombre }}</td>
                                <td class="align-middle text-center">{{ $favorito->producto->precio }}€</td>
                                <td class="align-middle text-center">
                                    <form action="{{route('producto.seleccionarProducto', $favorito->producto->id)}}">
                                        <button type="submit" class="btn btn-success btn-block">Ver producto</button>
                                    </form>
                                </td>
                                <td class="align-middle text-center">
                                    <form
                                        action="{{ route('wishlist.eliminar_producto_whishlist', $favorito->producto->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-block">Borrar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    {{--  Seccion de los productos en la wishlist End --}}

@endsection
