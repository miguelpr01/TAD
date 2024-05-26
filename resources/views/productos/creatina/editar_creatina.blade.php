@extends('template.main')
@section('title', 'Naturfit')

@section('contenido')
@include('includes.header')

    <section class="section-lista-creatinas py-5 bg-light-green" id="creatinas">
        <div class="container">
            <h3 class="mb-4 text-dark-green">Editar creatina</h3>
            <form action="{{ route('confirmar_editar_creatina', $producto->id) }}" method="POST" id="creatina">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nombre" class="form-label text-dark-green">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control"
                        value="{{ old('nombre', $producto->nombre) }}">
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label text-dark-green">Precio:</label>
                    <input type="number" name="precio" id="precio" class="form-control"
                        value="{{ old('precio', $producto->precio) }}">
                </div>
                <div class="mb-3">
                    <label for="imagen" class="form-label text-dark-green">Imagen:</label>
                    <input type="text" name="imagen" id="imagen" class="form-control"
                        value="{{ old('imagen', $producto->imagen) }}">
                </div>
                <div class="mb-3">
                    <label for="opcion" class="form-label text-dark-green">Opción:</label>
                    <input type="text" name="opcion" id="opcion" class="form-control"
                        value="{{ old('opcion', $producto->creatina->opcion) }}">
                </div>
                <button type="submit" class="btn btn-success me-2">Guardar</button>
                <a href="{{ route('ver_proteinas') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </section>
@endsection
