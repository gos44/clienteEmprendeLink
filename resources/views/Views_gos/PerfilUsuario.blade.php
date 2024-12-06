@extends('layouts.Nav-Bar_Usuario')
@extends('layouts.Footer_Usuario')

@section('content')
<div class="perfil-container">
    @if($errors->any())
        <div class="error-message">
            {{ $errors->first() }}
        </div>
    @endif

    <div class="perfil-info">
        <h2>Información de Perfil</h2>

        <div class="perfil-item">
            <strong>Nombres:</strong>
            {{ $user['nombres'] ?? 'No disponible' }}
        </div>

        <div class="perfil-item">
            <strong>Apellidos:</strong>
            {{ $user['apellidos'] ?? 'No disponible' }}
        </div>

        <div class="perfil-item">
            <strong>Fecha de nacimiento:</strong>
            {{ $user['fecha_nacimiento'] ?? 'No disponible' }}
        </div>

        <div class="perfil-item">
            <strong>Correo:</strong>
            {{ $user['correo'] ?? 'No disponible' }}
        </div>

        <div class="perfil-item">
            <strong>Ubicación:</strong>
            {{ $user['ubicacion'] ?? 'No disponible' }}
        </div>

        <div class="perfil-item">
            <strong>Celular:</strong>
            {{ $user['celular'] ?? 'No disponible' }}
        </div>

        <div class="perfil-item">
            <strong>Número:</strong>
            {{ $user['numero'] ?? 'No disponible' }}
        </div>

        <div class="perfil-item">
            <strong>Documento:</strong>
            {{ $user['documento'] ?? 'No disponible' }}
        </div>
    </div>

    <div class="perfil-acciones">
        <button class="btn-editar">Editar perfil</button>
        <button class="btn-cerrar-sesion">Cerrar Sesión</button>
    </div>
</div>
@endsection
