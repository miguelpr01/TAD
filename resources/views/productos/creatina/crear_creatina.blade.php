@extends('template.main')
@section('title', 'Naturfit')

@section('contenido')
@include('includes.header')

    {{-- Section Lista Creatinas Start --}}
    <section class="section-lista-creatinas py-5" id="creatinas">
        <div class="container">
            <h3 class="mb-4">Añadir creatina</h3>
            <form action="{{ route('confirmar_crear_creatina') }}" method="POST" id="creatina">
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
                        value="/storage/images/creatina/nombreProducto.png">
                </div>
                <div class="mb-3">
                    <label for="opcion" class="form-label">Opción:</label>
                    <input type="text" name="opcion" id="opcion" class="form-control">
                </div>
                <button type="submit" class="btn btn-success me-2">Guardar</button>
                <a href="{{ route('ver_creatinas') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </section>
    {{-- Section Lista Creatinas End --}}
@endsection
