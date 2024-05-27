@extends('template.main')

@section('title', 'Favoritos')

@section('contenido')
@include('includes.header')

@if (session('mensaje_pedido_realizado'))
    <div class="alert alert-success" role="alert">
        {{ session('mensaje_pedido_realizado') }}
    </div>
@endif
{{-- Seccion de los productos en el carrito --}}
@if (session('mensaje_eliminar_prod_wishlist'))
    <div class="alert alert-success">
        {{ session('mensaje_eliminar_prod_wishlist') }}
    </div>
@endif

<section class="seccion-lista-proteinas">
    <div class="container mt-3">
        <h1 class="titulo">Carrito</h1>
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
                    @foreach ($carritos as $carrito)
                        <tr>
                            <td class="text-center">
                                <div class="image-container">
                                    <img src="{{ $carrito->producto->imagen }}" alt="{{ $carrito->producto->nombre }}"
                                        class="img-thumbnail">
                                </div>
                            </td>
                            <td class="align-middle text-center">{{ $carrito->producto->nombre }}</td>
                            <td class="align-middle text-center">{{ $carrito->producto->precio }}€</td>
                            <td class="align-middle text-center">
                                <form action="{{ route('carrito_compra.actualizar_cantidad', $carrito->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3 cantidad_producto">
                                        <label for="cantProducto" class="form-label"><strong>Cantidad del
                                                producto</strong></label>
                                        <input type="number" class="form-control" id="cantProducto" name="cantProducto"
                                            min="1" required value="{{ $carrito->cantProducto }}">
                                        <button type="submit" class="btn btn-primary mt-2">Actualizar</button>
                                    </div>
                                </form>
                            </td>
                            <td class="align-middle text-center">
                                <form action="{{route('producto.seleccionarProducto', $carrito->producto->id)}}">
                                    <button type="submit" class="btn btn-success btn-block">Ver producto</button>
                                </form>
                            </td>
                            <td class="align-middle text-center">
                                <form action="{{ route('carrito_compra.eliminar_producto', $carrito->producto->id) }}" method="POST">
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
    <form action="{{ route('pedido.comprar_carrito') }}" method="GET">
    @csrf
    <div class="mb-3 direccion_envio">
        <label for="direccion_id" class="form-label"><strong>Dirección de envío:</strong></label>
        <select class="form-select" id="direccion_id" name="direccion_id" required>
            @auth
                @foreach ($datos['usuario']->direccion as $direccion)
                    <option value="{{ $direccion->id }}">{{ $direccion->__toString() }}</option>
                @endforeach
            @endauth
        </select>
        <div class="invalid-feedback">Por favor selecciona una dirección de envío.</div>
    </div>
    <button type="submit" class="btn btn-success btn-block comprar-carrito" {{ $carritos->isEmpty() ? 'disabled' : '' }}>Comprar</button>
</form>
</section>
{{-- Seccion de los productos en el carrito --}}

@endsection