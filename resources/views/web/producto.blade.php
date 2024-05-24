@extends('template.main')

@section('titulo', 'Producto')

@section('contenido')
    @include('includes.header')

    {{-- Información de producto Start --}}
    <section>
        @if (session('mensaje_error_autenticacion'))
            <div class="alert alert-danger" role="alert">
                {{ session('mensaje_error_autenticacion') }}
            </div>
        @endif
        
        @php
            $producto = $datos['producto'];
        @endphp
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 my-3">
                    <img src="{{ $producto->imagen }}" alt="Imagen del producto" class="imagen-producto img-fluid">
                </div>
                <div class="col-md-6">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Nombre: </strong>{{ $producto->nombre }}</li>
                        <li class="list-group-item"><strong>Precio: </strong>{{ $producto->precio }}</li>
                        @if (isset($producto->proteina))
                        <li class="list-group-item"><strong>Sabor: </strong>{{ $producto->proteina->sabor }}</li>
                        <li class="list-group-item"><strong>Cantidad (Kg): </strong>{{ $producto->proteina->cantidad }}</li>
                        @elseif (isset($producto->creatina))
                        <li class="list-group-item"><strong>Opcion: </strong>{{ $producto->creatina->opcion }}</li>
                        @elseif(isset($producto->ropa))
                        <li class="list-group-item"><strong>Talla: </strong>{{ $producto->ropa->talla }}</li>
                        <li class="list-group-item"><strong>Color: </strong>{{ $producto->ropa->color }}</li>
                        @endif

                        @if (session('mensaje'))
                            <div class="alert alert-success" role="alert">
                                {{ session('mensaje') }}
                            </div>
                        @endif

                        @auth
                            <form action="{{ route('pedido.comprar_ya') }}" class="needs-validation" novalidate>
                                @csrf
                                <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                                
                                <div class="mb-3">
                                    <label for="cantidad" class="form-label"><strong>Cantidad del producto</strong></label>
                                    <input type="number" class="form-control" id="cantidad" name="cantidad" min="1" required>
                                </div>

                                @if (session('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                <div class="mb-3">
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

                                <button type="submit" class="btn btn-success btn-block">Comprar</button>
                            </form>
                        @else
                            <form action="{{ route('login') }}" class="needs-validation" novalidate>
                                @csrf
                                <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                                
                                <div class="mb-3">
                                    <label for="cantidad" class="form-label"><strong>Cantidad del producto</strong></label>
                                    <input type="number" class="form-control" id="cantidad" name="cantidad" min="1" required>
                                </div>

                                @if (session('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                <div class="mb-3">
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

                                <button type="submit" class="btn btn-success btn-block">Comprar</button>
                            </form>
                        @endauth

                    </ul>
                </div>
            </div>
        </div>
    </section>


    {{-- Información de producto End --}}

@endsection