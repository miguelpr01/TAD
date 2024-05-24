@extends('template.main')

@section('title', 'Naturfit')

@section('contenido')

    @include('includes.header')

    {{-- Sección de la lista de productos Start --}}
    <section class="section-lista-productos" id="productos">
        <div class="container">
            @if (session('mensaje_modificar_estado'))
                <div class="message-created-note alert alert-success" role="alert">
                    {{ session('mensaje_modificar_estado') }}
                </div>
            @endif
            <h1 class="titulo">Lista de Pedidos</h1>
            <div class="row">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Cliente</th>
                            <th>Productos</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pedidos as $pedido)
                            <tr>
                                <td>{{ $pedido->id }}</td>
                                <td>{{ $pedido->user->nombre }}{{ " " }}{{ $pedido->user->apellidos }}</td>
                                <td>
                                    @foreach ($pedido->producto as $producto)
                                        <div>{{ $producto->nombre }}</div>
                                    @endforeach
                                </td>
                                <td>{{ $pedido->fechaPedido }}</td>
                                <form action="{{ route('editar_estado', $pedido->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <td>
                                        <input type="text" name="estadoPedido" id="estadoPedido" value="{{ $pedido->estadoPedido }}">
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-success me-2">Actualizar estado</button>
                                    </td>
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    {{-- Sección de la lista de productos End --}}

@endsection
