@extends('template.main')
@section('title', 'Naturfit')

@section('contenido')
@include('includes.header')

    {{-- Edit Protein Section Start --}}
    <section class="section-lista-proteinas py-5" id="proteinas">
        <div class="container">
            <h3 class="mb-4">Editar proteína</h3>
            <form action="{{ route('confirmar_editar_proteina', $producto->id) }}" method="POST" id="proteina">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nombre" class="form-label"><strong>Nombre:</strong></label>
                    <input type="text" name="nombre" id="nombre" class="form-control"
                        value="{{ old('nombre', $producto->nombre) }}">
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label"><strong>Precio:</strong></label>
                    <input type="number" name="precio" id="precio" class="form-control"
                        value="{{ old('precio', $producto->precio) }}">
                </div>
                <div class="mb-3">
                    <label for="imagen" class="form-label"><strong>Imagen:</strong></label>
                    <input type="text" name="imagen" id="imagen" class="form-control"
                        value="{{ old('imagen', $producto->imagen) }}">
                </div>
                <div class="mb-3">
                    <label for="sabor" class="form-label"><strong>Sabor:</strong></label>
                    <input type="text" name="sabor" id="sabor" class="form-control"
                        value="{{ old('sabor', $producto->proteina->sabor) }}">
                </div>
                <div class="mb-4">
                    <label for="cantidad" class="form-label"><strong>Cantidad:</strong></label>
                    <input type="text" name="cantidad" id="cantidad" class="form-control"
                        value="{{ old('cantidad', $producto->proteina->cantidad) }}">
                </div>
                <button type="submit" class="btn btn-success me-2">Guardar</button>
                <a href="{{ route('ver_proteinas') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </section>
    {{-- Edit Protein Section End --}}
@endsection
