@extends('template.main')

@section('title', 'Naturfit')

@section('contenido')

    @include('includes.header')

    {{-- Carousel Start --}}
    <section class="section-carousel">
        <div class="container-fluid">
            <div id="carouselControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="5000">
                        <img src="{{ url('storage/images/carousel_index/carousel1.jpg') }}" class="d-block w-100 img-fluid"
                            alt="Imagen Carousel 1">
                    </div>
                    <div class="carousel-item" data-bs-interval="5000">
                        <img src="{{ url('storage/images/carousel_index/carousel2.jpg') }}"
                            class="d-block w-100 img-fluid" alt="Imagen Carousel 2">
                    </div>
                    <div class="carousel-item" data-bs-interval="5000">
                        <img src="{{ url('storage/images/carousel_index/carousel3.jpg') }}"
                            class="d-block w-100 img-fluid" alt="Imagen Carousel 3">
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
    <section class="section-lista-productos" id="productos">
        <div class="container">
            <h1 class="text-center mb-5">{{__('messages.algunos_productos')}}</h1>
            <div class="row">
                @foreach ($productos as $categoria)
                    @foreach ($categoria as $producto)
                        @foreach ($producto as $elemento)
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 shadow-sm">
                                    <img src="{{ $elemento->producto->imagen }}" class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $elemento->producto->nombre }}</h5>
                                        <p class="card-text">{{ $elemento->producto->precio }}€</p>
                                        <form
                                            action="{{ route('producto.seleccionarProducto', $elemento->producto->id) }}">
                                            <button type="submit" class="btn btn-success btn-block">{{__('messages.ver_producto')}}</button>
                                        </form>
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

    {{-- Footer Start --}}
    <footer class="footer">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-4">
                    <p>{{__('messages.parrafo1')}}</p>
                </div>
                <div class="col-md-4">
                    <h4>{{__('messages.menu')}}</h4>
                    <ul>
                        <li><a href="#">{{__('messages.home')}}</a></li>
                        <li><a href="#productos">{{__('messages.productos')}}</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h4>{{__('messages.redes_sociales')}}</h4>
                    <ul class="redes-sociales">
                        <li><a href="#"><img src="{{ url('storage/images/icons/facebook.png') }}"
                                    alt=""></a></li>
                        <li><a href="#"><img src="{{ url('storage/images/icons/twitter.png') }}"
                                    alt=""></a></li>
                        <li><a href="#"><img src="{{ url('storage/images/icons/instagram.png') }}"
                                    alt=""></a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center copyright">
                <p xmlns:cc="http://creativecommons.org/ns#" xmlns:dct="http://purl.org/dc/terms/"><a property="dct:title" rel="cc:attributionURL" href="https://github.com/miguelpr01/TAD">Naturfit</a> by <span property="cc:attributionName">Miguel Pavón Rodríguez, Daniel “Polaco” Martínez Krol, Rodrigo Bautista Hernández</span> is licensed under <a href="https://creativecommons.org/licenses/by-nd/4.0/?ref=chooser-v1" target="_blank" rel="license noopener noreferrer" style="display:inline-block;">CC BY-ND 4.0<img style="height:22px!important;margin-left:3px;vertical-align:text-bottom;" src="https://mirrors.creativecommons.org/presskit/icons/cc.svg?ref=chooser-v1" alt=""><img style="height:22px!important;margin-left:3px;vertical-align:text-bottom;" src="https://mirrors.creativecommons.org/presskit/icons/by.svg?ref=chooser-v1" alt=""><img style="height:22px!important;margin-left:3px;vertical-align:text-bottom;" src="https://mirrors.creativecommons.org/presskit/icons/nd.svg?ref=chooser-v1" alt=""></a></p>
                </div>
            </div>
        </div>
    </footer>
    {{-- Footer End --}}

@endsection
