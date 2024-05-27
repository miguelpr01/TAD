{{-- Header Start --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">
<!-- Bootstrap CSS -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS (Bundle) -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>

<section class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a href="/">
                    <img src="{{ url('storage/images/logoWeb/logo_web.png') }}" alt="Logo" class="img-fluid">
                </a>
            </div>
            <div class="col-md-8 d-flex justify-content-end">
                @if (Route::has('login'))
                    @guest
                        <button id="dropdownMenuLink" data-bs-toggle="dropdown" type="submit"
                            class="btn btn-success me-2">{{__('messages.productos')}}</button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li>
                                <a class="dropdown-item text-success"
                                    href="{{ route('producto.listaproteinas') }}">{{__('messages.proteina')}}</a>
                            </li>
                            <li>
                                <a class="dropdown-item text-success"
                                    href="{{ route('producto.listacreatinas') }}">{{__('messages.creatina')}}</a>
                            </li>
                            <li>
                                <a class="dropdown-item text-success"
                                    href="{{ route('producto.listaropas') }}">{{__('messages.ropa')}}</a>
                            </li>
                        </ul>
                    @endguest
                    @auth
                        @if (Auth::user()->rol_id == 1)
                            <button id="dropdownMenuLink" data-bs-toggle="dropdown" type="submit"
                                class="btn btn-success me-2">{{__('messages.productos')}}</button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li>
                                    <a class="dropdown-item text-success"
                                        href="{{ route('ver_proteinas') }}">{{__('messages.proteina')}}</a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-success"
                                        href="{{ route('ver_creatinas') }}">{{__('messages.creatina')}}</a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-success"
                                        href="{{ route('ver_ropas') }}">{{__('messages.ropa')}}</a>
                                </li>
                            </ul>
                            <button id="dropdownMenuLink" data-bs-toggle="dropdown" type="submit"
                                class="btn btn-success me-2">{{ Auth::user()->nombre }}</button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                </form>
                                <li>
                                    <a class="dropdown-item text-success"
                                        href="{{ route('index.index') }}">{{__('messages.home')}}</a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-success"
                                        href="{{ route('ver_todos_pedidos') }}">{{__('messages.pedidos')}}</a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-success"
                                        href="{{ route('wishlist.productos_favoritos') }}">{{__('messages.fav')}}</a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-success" href="#"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{__('messages.logout')}}
                                    </a>
                                </li>
                            </ul>
                        @elseif (Auth::user()->rol_id == 2)
                            <a href="{{route('wishlist.wishlist')}}">
                                <img src="{{ url('storage/images/icons/wishlist.png') }}" alt="wishlist" class="img-fluid carrito">
                            </a>
                            <a href="{{route('carrito_compra.carrito_compra')}}">
                                <img src="{{ url('storage/images/icons/carrito-de-compras.png') }}" alt="carrito"
                                    class="img-fluid carrito">
                            </a>
                            <button id="dropdownMenuLink" data-bs-toggle="dropdown" type="submit"
                                class="btn btn-success me-2">{{__('messages.productos')}}</button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li>
                                    <a class="dropdown-item text-success"
                                        href="{{ route('producto.listaproteinas') }}">{{__('messages.proteina')}}</a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-success"
                                        href="{{ route('producto.listacreatinas') }}">{{__('messages.creatina')}}</a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-success"
                                        href="{{ route('producto.listaropas') }}">{{__('messages.ropa')}}</a>
                                </li>
                            </ul>
                            <button id="dropdownMenuLink" data-bs-toggle="dropdown" type="submit"
                                class="btn btn-success me-2">{{ Auth::user()->nombre }}</button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                </form>
                                <li>
                                    <a class="dropdown-item text-success"
                                        href="{{ route('index.index') }}">{{__('messages.home')}}</a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-success"
                                        href="{{ route('user.detalles') }}">{{__('messages.perfil')}}</a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-success"
                                        href="{{ route('ver_pedidos') }}">{{__('messages.pedidos')}}</a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-success" href="#"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{__('messages.logout')}}
                                    </a>
                                </li>
                            </ul>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="btn btn-success me-2">{{__('messages.login')}}</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-success">{{__('messages.register')}}</a>
                        @endif
                    @endauth
                @endif
                        <div class="dropdown language">
                            <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Idioma
                                <i class="fa-solid fa-language"></i>
                            </button>
                            <ul class="dropdown-menu sinpunto">
                                <li >
                                    <a class="dropdown-item" href="{{ route('index.changeLocale', ['locale' => 'es']) }}">
                                        <i class="flag-icon flag-icon-es"></i>
                                        <span>Español</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('index.changeLocale',['locale' => 'en']) }}">
                                        <i class="flag-icon flag-icon-gb"></i>
                                        <span>English</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
            </div>
        </div>
    </div>
</section>
{{-- Header End --}}