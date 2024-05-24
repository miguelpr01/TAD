@extends('template.main')
@section('title', 'Naturfit')

@section('contenido')
@include('includes.header')

<section class="section-lista-proteinas" id="proteinas">
    <div class="container">
        <h3>Editar proteína</h3>
            <form action="{{ route('confirmar_editar_proteina' , $producto->id) }}" method="POST" id="proteina">
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
                    <br>
                    <label for="sabor">Sabor:</label>
                    <input type="text" name="sabor" id="sabor" value="{{ old('sabor', $producto->proteina->sabor) }}">
                    <br>
                    <label for="cantidad">Cantidad:</label>
                    <input type="text" name="cantidad" id="cantidad" value="{{ old('cantidad', $producto->proteina->cantidad) }}">
                </div>
                <button type="submit" class="btn btn-success me-2">Guardar</button>
            </form>
            <form method="GET" action="{{ route('ver_proteinas') }}" class="max-w-sm mx-auto">
                <button type="submit" class="btn btn-success me-2">Cancelar</button>
            </form>
        </div>
    </div>
</section>
@endsection