<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>
    @vite(['resources/js/app.js', 'resources/css/app.scss', 'resources/css/index.css'])
</head>
<body>
    @yield('contenido')
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
</body>
</html>