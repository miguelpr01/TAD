@extends('template.main')
@section('title', 'Naturfit')

@section('contenido')
@include('includes.header')

    {{-- Section Lista Ropas Start --}}
    <section class="section-lista-ropas py-5" id="ropas">
        <div class="container">
            <h3 class="mb-4">Añadir ropa</h3>
            <form action="{{ route('confirmar_crear_ropa') }}" method="POST" id="ropa">
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
                        value="/storage/images/ropa/nombreProducto.png">
                </div>
                <div class="mb-3">
                    <label for="talla" class="form-label">Talla:</label>
                    <select name="talla" id="talla" class="form-select">
                        <option value="XS">XS</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="color" class="form-label">Color:</label>
                    <input type="text" name="color" id="color" class="form-control">
                </div>
                <button type="submit" class="btn btn-success me-2">Guardar</button>
                <a href="{{ route('ver_proteinas') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </section>
    {{-- Section Lista Ropas End --}}
@endsection
