@extends('template.main')
@section('title', 'Naturfit')

@section('contenido')
@include('includes.header')

<section class="section-lista-ropas" id="ropas">
    <div class="container">
        <h3>Editar ropa</h3>
            <form action="{{ route('confirmar_editar_ropa' , $producto->id) }}" method="POST" id="ropa">
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
                    <label for="talla">Talla:</label>
                    <select name="talla" id="talla" value="{{ old('tallar', $producto->ropa->tallar) }}">
                        <option value="XS">XS</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                    </select>
                    <br>
                    <label for="color">Color:</label>
                    <input type="text" name="color" id="color" value="{{ old('color', $producto->ropa->color) }}">
                </div>
                <button type="submit" class="btn btn-success me-2">Guardar</button>
            </form>
            <form method="GET" action="{{ route('ver_ropas') }}" class="max-w-sm mx-auto">
                <button type="submit" class="btn btn-success me-2">Cancelar</button>
            </form>
        </div>
    </div>
</section>
@endsection