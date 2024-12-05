@extends('layouts.app')

@section('title', 'Iniciar Sesión')

@section('head')
    <!-- Enlace al archivo CSS -->
    <link rel="stylesheet" href="{{ asset('css/inicio_de_sesion.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Iniciar Sesión') }}</div>

                <div class="card-body">
                    <!-- Inicio del formulario -->
                    <form method="POST" action="{{ route('iniciar_sesion_usuario.login') }}">
                        @csrf <!-- Token de seguridad para Laravel -->

                        <!-- Campo de Email -->
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Correo Electrónico</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Campo de Contraseña -->
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Selección de Rol -->
                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">Seleccione su Rol</label>
                            <div class="col-md-6">
                                <select id="role" name="role" class="form-control @error('role') is-invalid @enderror" required>
                                    <option value="">Seleccione su rol</option>
                                    <option value="entrepreneur">Emprendedor</option>
                                    <option value="investor">Inversor</option>
                                </select>
                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Botón de Enviar -->
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Iniciar Sesión') }}
                                </button>
                                <a class="btn btn-link" href="{{ route('verificar_identidad_usuario') }}">
                                    ¿Olvidaste tu contraseña?
                                </a>
                            </div>
                        </div>
                    </form>
                    <!-- Fin del formulario -->

                    <!-- Registro -->
                    <div class="text-center mt-4">
                        <p>¿No tienes una cuenta? <a href="{{ route('registrar_nuevo_usuario.store') }}">Regístrate aquí</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
