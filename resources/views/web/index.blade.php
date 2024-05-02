@extends('template.main')

@section('title', 'Naturfit')

@section('contenido')

    {{-- Header Start --}}
    <section class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ url('storage/images/logoWeb/logo_web.png') }}" alt="Logo" class="img-fluid">
                </div>
                <div class="col-md-8 d-flex justify-content-end">
                    <a href="#" class="btn btn-success me-2">Iniciar sesión</a>
                    <a href="#" class="btn btn-success">Registro</a>
                </div>
            </div>
        </div>
    </section>
    {{-- Header End --}}


    {{-- Nav Start --}}
    <section class="btn-paginas">
        <div class="container-xl">
            <div class="row justify-content-center">
                <div class="col text-center">
                    <a href="" class="btn btn-success">Proteina</a>
                </div>
                <div class="col text-center">
                    <a href="" class="btn btn-success">Creatina</a>
                </div>
                <div class="col text-center">
                    <a href="" class="btn btn-success">Ropa</a>
                </div>
            </div>
        </div>
    </section>
    {{-- Nav End --}}


    {{-- Carousel Start --}}
    <section class="section-carousel">
        <div class="container-xl">
            <div id="carouselControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ url('storage/images/carousel_index/carousel1.jpg') }}" class="d-block w-100 img-fluid"
                            alt="Imagen Carousel 1">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ url('storage/images/carousel_index/carousel2.jpg') }}" class="d-block w-100 img-fluid"
                            alt="Imagen Carousel 2">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ url('storage/images/carousel_index/carousel3.jpg') }}" class="d-block w-100 img-fluid"
                            alt="Imagen Carousel 3">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselControls"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselControls"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
    {{-- Carousel End --}}

    {{-- Sección de la lista de productos Start --}}
    <section class="section-lista-productos">
        <div class="container">
            <h1 class="text-center mb-5">Lista de productos</h1>
            <div class="row">
                @foreach ($productos as $categoria)
                    @foreach ($categoria as $producto)
                        @foreach ($producto as $elemento)
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 shadow-sm">
                                    <img src="{{ $elemento->producto->imagen }}"
                                        class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            {{ $elemento->producto->nombre }}</h5>
                                        <p class="card-text">
                                            {{ $elemento->producto->precio }}</p>
                                        <a href="#"
                                            class="btn btn-primary btn-block">Comprar</a>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                    @endforeach
                @endforeach
                </div>
            </div>
    </section>
    {{-- Sección de la lista de productos End --}}

@endsection
