@extends('template.main')
@section('title', 'Naturfit')

@section('contenido')
@include('includes.header')

    {{-- Section Lista Proteínas Start --}}
    <section class="section-lista-proteinas py-5" id="proteinas">
        <div class="container">
            <h3 class="mb-4">Añadir proteína</h3>
            <form action="{{ route('confirmar_crear_proteina') }}" method="POST" id="proteina">
                @csrf
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio:</label>
                    <input type="number" name="precio" id="precio" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen:</label>
                    <input type="text" name="imagen" id="imagen" class="form-control"
                        value="/storage/images/proteinas/nombreProducto.png">
                </div>
                <div class="mb-3">
                    <label for="sabor" class="form-label">Sabor:</label>
                    <input type="text" name="sabor" id="sabor" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="cantidad" class="form-label">Cantidad:</label>
                    <input type="text" name="cantidad" id="cantidad" class="form-control">
                </div>
                <button type="submit" class="btn btn-success me-2">Guardar</button>
                <a href="{{ route('ver_proteinas') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </section>
    {{-- Section Lista Proteínas End --}}
@endsection
