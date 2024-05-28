@extends('template.main')

@section('titulo', 'Registro')

@section('contenido')
    {{-- Header Start --}}
    <section class="header">
        <div class="container">
            <div class="col-md-4">
                <a href="/">
                    <img src="{{ url('storage/images/logoWeb/logo_web.png') }}" alt="Logo" class="img-fluid">
                </a>
            </div>
            <div class="col-md-8 d-flex justify-content-end">
            </div>
        </div>
        </div>
    </section>
    {{-- Header End --}}

    {{-- Register Start --}}
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-success text-white">{{ __('Registro') }}</div>
                    <div class="card-body">
                        <form action="{{ route('register') }}" method="POST">
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
                                                    <input id="nombre" type="text"
                                                        class="form-control @error('nombre') is-invalid @enderror"
                                                        name="nombre" value="{{ old('nombre') }}" required
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
                                                    <input id="apellidos" type="text"
                                                        class="form-control @error('apellidos') is-invalid @enderror"
                                                        name="apellidos" value="{{ old('apellidos') }}" required
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
                                                    <input id="email" type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" value="{{ old('email') }}" required
                                                        autocomplete="email">
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label for="password"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>
                                                <div class="col-md-6">
                                                    <input id="password" type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        name="password" value="{{ old('password') }}" required autocomplete="new-password">
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label for="password-confirm"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirmar contraseña') }}</label>

                                                <div class="col-md-6">
                                                    <input id="password-confirm" type="password" class="form-control"
                                                        name="password_confirmation" value="{{ old('password-confirm') }}" required autocomplete="new-password">
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label for="telefono"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Teléfono') }}</label>
                                                <div class="col-md-6">
                                                    <input id="telefono" type="phone"
                                                        class="form-control @error('telefono') is-invalid @enderror"
                                                        name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono">
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
                                                    <input id="fechaNacimiento" type="date"
                                                        class="form-control @error('fechaNacimiento') is-invalid @enderror"
                                                        name="fechaNacimiento" value="{{ old('fechaNacimiento') }}" required autocomplete="fechaNacimiento">
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
                                                    <input id="calle" type="text"
                                                        class="form-control @error('calle') is-invalid @enderror"
                                                        name="calle" value="{{ old('calle') }}" required
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
                                                    <input id="numero" type="number"
                                                        class="form-control @error('numero') is-invalid @enderror"
                                                        name="numero" value="{{ old('numero') }}" required
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
                                                    <input id="piso" type="number"
                                                        class="form-control @error('piso') is-invalid @enderror"
                                                        name="piso" value="{{ old('piso') }}" autocomplete="piso"
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
                                                    <input id="puerta" type="text"
                                                        class="form-control @error('puerta') is-invalid @enderror"
                                                        name="puerta" value="{{ old('puerta') }}" autocomplete="puerta"
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
                                                    <input id="codPostal" type="text"
                                                        class="form-control @error('codPostal') is-invalid @enderror"
                                                        name="codPostal" value="{{ old('codPostal') }}" required
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
                                                    <input id="ciudad" type="text"
                                                        class="form-control @error('ciudad') is-invalid @enderror"
                                                        name="ciudad" value="{{ old('ciudad') }}" required
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
                                                    <input id="provincia" type="text"
                                                        class="form-control @error('provincia') is-invalid @enderror"
                                                        name="provincia" value="{{ old('provincia') }}" required
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
                                                    <input id="pais" type="text"
                                                        class="form-control @error('pais') is-invalid @enderror"
                                                        name="pais" value="{{ old('pais') }}" required
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
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Registro') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
    {{-- Register End --}}
@endsection
