@extends('template.main')
@section('title', 'Naturfit')

@section('contenido')
@include('includes.header')

<section class="section-lista-creatinas" id="creatinas">
    <div class="container">
        <h3>Editar creatina</h3>
            <form action="{{ route('confirmar_editar_creatina' , $producto->id) }}" method="POST" id="creatina">
                @csrf
                @method('PUT')
                <div class="mb-5">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $producto->nombre) }}">
                    <br>
                    <label for="precio">Precio:</label>
                    <input type="number" name="precio" id="precio" value="{{ old('precio', $producto->precio) }}">
                    <br>
                    <label for="imagen">Imagen:</label>
                    <input type="text" name="imagen" id="imagen" value="{{ old('imagen', $producto->imagen) }}">
                    <br><label for="opcion">Opción:</label>
                    <input type="text" name="opcion" id="opcion" value="{{ old('opcion', $producto->creatina->opcion) }}">
                </div>
                <button type="submit" class="btn btn-success me-2">Guardar</button>
            </form>
            <form method="GET" action="{{ route('ver_creatinas') }}" class="max-w-sm mx-auto">
                <button type="submit" class="btn btn-success me-2">Cancelar</button>
            </form>
        </div>
    </div>
</section>
@endsection