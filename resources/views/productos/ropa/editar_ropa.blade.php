@extends('template.main')
@section('title', 'Naturfit')

@section('contenido')
@include('includes.header')

    <section class="section-lista-ropas py-5 bg-light-green" id="ropas">
        <div class="container">
            <h3 class="mb-4 text-dark-green">Editar ropa</h3>
            <form action="{{ route('confirmar_editar_ropa', $producto->id) }}" method="POST" id="ropa">
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
                    <label for="talla" class="form-label text-dark-green">Talla:</label>
                    <select name="talla" id="talla" class="form-control"
                        value="{{ old('tallar', $producto->ropa->tallar) }}">
                        <option value="XS">XS</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="color" class="form-label text-dark-green">Color:</label>
                    <input type="text" name="color" id="color" class="form-control"
                        value="{{ old('color', $producto->ropa->color) }}">
                </div>
                <button type="submit" class="btn btn-success me-2">Guardar</button>
                <a href="{{ route('ver_proteinas') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </section>
@endsection
