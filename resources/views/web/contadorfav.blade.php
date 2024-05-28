@extends('template.main')

@section('title', 'Productos favoritos')

@include('includes.header')

@section('contenido')
    {{-- Seccion lista del total de productos añadidos por el usuario a favoritos Start --}}
    <div class="container mt-5">
        <h1 class="titulo">Favoritos</h1>
        <canvas id="favoritosChart" width="400" height="200"></canvas>
        <div id="chartData" data-labels="{{ json_encode($favoritos->pluck('producto.nombre')) }}"
            data-values="{{ json_encode($favoritos->pluck('total')) }}">
        </div>
    </div>
    <script src="{{ asset('js/favoritos_chart.js') }}"></script>
    {{-- Seccion lista del total de productos añadidos por el usuario a favoritos End --}}
@endsection
