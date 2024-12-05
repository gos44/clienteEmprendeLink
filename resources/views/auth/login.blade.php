@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email">{{ __('Correo Electrónico') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Ingrese su correo electrónico">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Contraseña') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Ingrese su contraseña">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="role">{{ __('Seleccione su Rol') }}</label>
                            <select id="role" name="role" class="form-control @error('role') is-invalid @enderror" required>
                                <option value="">{{ __('Seleccione su rol') }}</option>
                                <option value="entrepreneur">{{ __('Emprendedor') }}</option>
                                <option value="investor">{{ __('Inversor') }}</option>
                            </select>

                            @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-center">
                            <a href="{{ route('verificar_identidad_usuario') }}" class="text-muted">{{ __('¿Olvidaste tu contraseña?') }}</a>
                            <button type="submit" class="btn btn-primary">{{ __('Iniciar sesión') }}</button>
                        </div>

                        <div class="text-center mt-3">
                            <p>{{ __('¿No tienes una cuenta?') }}
                                <a href="{{ route('registrar_nuevo_usuario.store') }}">{{ __('Regístrate') }}</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
