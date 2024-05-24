@extends('template.main')

@section('title', 'Naturfit')

@section('contenido')

    @include('includes.header')

    {{-- Sección de la lista de productos Start --}}
    <section class="section-lista-productos" id="productos">
        <div class="container">
            <h1 class="titulo">Lista de Pedidos</h1>
            <div class="row">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Productos</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pedidos as $pedido)
                            <tr>
                                <td>{{ $pedido->id }}</td>
                                <td>
                                    @foreach ($pedido->producto as $producto)
                                        <div>{{ $producto->nombre }}</div>
                                    @endforeach
                                </td>
                                <td>{{ $pedido->fechaPedido }}</td>
                                <td>{{ $pedido->estadoPedido }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    {{-- Sección de la lista de productos End --}}

@endsection
