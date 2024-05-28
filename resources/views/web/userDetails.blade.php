@extends('template.main')

@section('titulo', 'Detalles')

@section('contenido')
    @include('includes.header')

    @php
        $usuario = $vars['usuario'];
        $direccion = $vars['direcc'];
        if(isset($vars['success'])){
            $success = $vars['success'];
        }
    @endphp
    <script>
        <!--
        function editar() {
            document.getElementById('nombre').disabled = false;
            document.getElementById('apellidos').disabled = false;
            // document.getElementById('email').disabled = false;
            document.getElementById('telefono').disabled = false;
            document.getElementById('fechaNacimiento').disabled = false;
            document.getElementById('calle').disabled = false;
            document.getElementById('numero').disabled = false;
            document.getElementById('piso').disabled = false;
            document.getElementById('puerta').disabled = false;
            document.getElementById('codPostal').disabled = false;
            document.getElementById('ciudad').disabled = false;
            document.getElementById('provincia').disabled = false;
            document.getElementById('pais').disabled = false;
            document.getElementById('btnEditar').textContent = 'Cancelar';
            document.getElementById('btnEditar').setAttribute('onclick', 'cancelar()');
            document.getElementById('btnEditar').classList.remove('btn-outline-success');
            document.getElementById('btnEditar').classList.add('btn-outline-danger');
            document.getElementById('btnConfirmar').style.display = 'block';
        }

        function cancelar() {
            document.getElementById('nombre').disabled = true;
            document.getElementById('apellidos').disabled = true;
            // document.getElementById('email').disabled = true;
            document.getElementById('telefono').disabled = true;
            document.getElementById('fechaNacimiento').disabled = true;
            document.getElementById('calle').disabled = true;
            document.getElementById('numero').disabled = true;
            document.getElementById('piso').disabled = true;
            document.getElementById('puerta').disabled = true;
            document.getElementById('codPostal').disabled = true;
            document.getElementById('ciudad').disabled = true;
            document.getElementById('provincia').disabled = true;
            document.getElementById('pais').disabled = true;
            document.getElementById('btnEditar').textContent = 'Editar';
            document.getElementById('btnEditar').setAttribute('onclick', 'editar()');
            document.getElementById('btnEditar').classList.remove('btn-outline-danger');
            document.getElementById('btnEditar').classList.add('btn-outline-success');
            document.getElementById('btnConfirmar').style.display = 'none';
        }
        -->
    </script>

    {{-- User details Start --}}
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-success text-white">Detalles</div>
                    <div class="div_padre">
                        <button id="btnEditar" class="btn btn-outline-success float-right" onclick="editar()">Editar</button>
                        <a class="float-right fav-user" href="{{route('wishlist.wishlist')}}">
                            <button class="btn btn-outline-success">Favoritos</button>
                        </a>

                        <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{__('messages.idioma')}}
                            <i class="fa-solid fa-language"></i>
                        </button>
                        <ul class="dropdown-menu sinpunto">
                            <li>
                                <a class="dropdown-item" href="{{ route('index.changeLocale', ['locale' => 'es']) }}">
                                    <i class="flag-icon flag-icon-es"></i>
                                    <span>Español</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('index.changeLocale', ['locale' => 'en']) }}">
                                    <i class="flag-icon flag-icon-gb"></i>
                                    <span>English</span>
                                </a>
                            </li>
                        </ul>

                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.editar') }}" method="POST">
                            @csrf
                            <div class="card mb-3">
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <div class="card-header bg-success text-white">{{ __('Datos personales') }}</div>
                                        <div class="card-body">

                                            <div class="form-group row mb-3">
                                                <label for="nombre"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                                                <div class="col-md-6">
                                                    <input disabled id="nombre" type="text"
                                                        class="form-control @error('nombre') is-invalid @enderror"
                                                        name="nombre" value="{{ $usuario->nombre }}" required
                                                        autocomplete="nombre" autofocus>
                                                    @error('nombre')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label for="apellidos"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>
                                                <div class="col-md-6">
                                                    <input disabled id="apellidos" type="text"
                                                        class="form-control @error('apellidos') is-invalid @enderror"
                                                        name="apellidos" value="{{ $usuario->apellidos }}" required
                                                        autocomplete="apellidos" autofocus>
                                                    @error('apellidos')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label for="email"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Correo electrónico') }}</label>
                                                <div class="col-md-6">
                                                    <input disabled id="email" type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" value="{{ $usuario->email }}" required
                                                        autocomplete="email">
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label for="telefono"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Teléfono') }}</label>
                                                <div class="col-md-6">
                                                    <input disabled id="telefono" type="phone"
                                                        class="form-control @error('telefono') is-invalid @enderror"
                                                        name="telefono" value="{{ $usuario->telefono }}" required autocomplete="telefono">
                                                    @error('telefono')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label for="fechaNacimiento"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Fecha de nacimiento') }}</label>
                                                <div class="col-md-6">
                                                    <input disabled id="fechaNacimiento" type="date"
                                                        class="form-control @error('fechaNacimiento') is-invalid @enderror"
                                                        name="fechaNacimiento" value="{{ $usuario->fechaNacimiento }}" required autocomplete="fechaNacimiento">
                                                    @error('fechaNacimiento')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-header bg-success text-white">{{ __('Dirección') }}</div>
                                        <div class="card-body">

                                            <div class="form-group row mb-3">
                                                <label for="calle"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Calle') }}</label>
                                                <div class="col-md-6">
                                                    <input disabled id="calle" type="text"
                                                        class="form-control @error('calle') is-invalid @enderror"
                                                        name="calle" value="{{ $direccion->calle }}" required
                                                        autocomplete="calle" autofocus>
                                                    @error('calle')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label for="numero"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Número') }}</label>
                                                <div class="col-md-6">
                                                    <input disabled id="numero" type="number"
                                                        class="form-control @error('numero') is-invalid @enderror"
                                                        name="numero" value="{{ $direccion->numero }}" required
                                                        autocomplete="numero" autofocus>
                                                    @error('numero')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label for="piso"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Piso (Opcional)') }}</label>
                                                <div class="col-md-6">
                                                    <input disabled id="piso" type="number"
                                                        class="form-control @error('piso') is-invalid @enderror"
                                                        name="piso" value="{{ $direccion->piso }}" autocomplete="piso"
                                                        autofocus>
                                                    @error('piso')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label for="puerta"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Puerta (Opcional)') }}</label>
                                                <div class="col-md-6">
                                                    <input disabled id="puerta" type="text"
                                                        class="form-control @error('puerta') is-invalid @enderror"
                                                        name="puerta" value="{{ $direccion->puerta }}" autocomplete="puerta"
                                                        autofocus>
                                                    @error('puerta')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label for="codPostal"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Código postal') }}</label>
                                                <div class="col-md-6">
                                                    <input disabled id="codPostal" type="text"
                                                        class="form-control @error('codPostal') is-invalid @enderror"
                                                        name="codPostal" value="{{ $direccion->codPostal }}" required
                                                        autocomplete="codPostal" autofocus>
                                                    @error('codPostal')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label for="ciudad"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Ciudad') }}</label>
                                                <div class="col-md-6">
                                                    <input disabled id="ciudad" type="text"
                                                        class="form-control @error('ciudad') is-invalid @enderror"
                                                        name="ciudad" value="{{ $direccion->ciudad }}" required
                                                        autocomplete="ciudad" autofocus>
                                                    @error('ciudad')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label for="provincia"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Provincia') }}</label>
                                                <div class="col-md-6">
                                                    <input disabled id="provincia" type="text"
                                                        class="form-control @error('provincia') is-invalid @enderror"
                                                        name="provincia" value="{{ $direccion->provincia }}" required
                                                        autocomplete="provincia" autofocus>
                                                    @error('provincia')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label for="pais"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('País') }}</label>
                                                <div class="col-md-6">
                                                    <input disabled id="pais" type="text"
                                                        class="form-control @error('pais') is-invalid @enderror"
                                                        name="pais" value="{{ $direccion->pais }}" required
                                                        autocomplete="pais" autofocus>
                                                    @error('pais')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="btnConfirmar" class="card-footer" style="display:none;">
                                <button type="submit" class="btn btn-success">
                                    Confirmar
                                </button>
                            </div>
                        </form>
                    </div>
                </>
            </div>

            @if (isset($success))
                <div class="alert alert-success mt-3" role="alert">
                    {{ $success }}
                </div>
            
            @endif


        </div>
    </div>
    {{-- User details End --}}
@endsection
