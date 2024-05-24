@extends('template.main')
@section('title', 'Naturfit')

@section('contenido')
@include('includes.header')

<section class="section-lista-ropas" id="ropas">
    <div class="container">
        <h3>Añadir ropa</h3>
            <form action="{{ route('confirmar_crear_ropa') }}" method="POST" id="ropa">
                @csrf
                <div class="mb-5">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre">
                    <br>
                    <label for="precio">Precio:</label>
                    <input type="number" name="precio" id="precio">
                    <br>
                    <label for="imagen">Imagen:</label>
                    <input type="text" name="imagen" id="imagen">
                    <br>
                    <label for="talla">Talla:</label>
                    <select name="talla" id="talla">
                        <option value="XS">XS</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                    </select>
                    <br>
                    <label for="color">Color:</label>
                    <input type="text" name="color" id="color">
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