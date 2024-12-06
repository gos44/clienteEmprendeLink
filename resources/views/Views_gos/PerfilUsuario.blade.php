@extends('layouts.app') <!-- Asumiendo que usas un layout general -->

@section('content')
    <div class="perfil-container">
        <h1>Perfil de Usuario</h1>

        <div class="perfil-info">
            <img src="{{ $user['image'] }}" alt="Foto de perfil" class="perfil-image">

            <div class="perfil-details">
                <p><strong>Nombre:</strong> {{ $user['name'] }} {{ $user['lastname'] }}</p>
                <p><strong>Email:</strong> {{ $user['email'] }}</p>
                <p><strong>Teléfono:</strong> {{ $user['phone'] }}</p>
                <p><strong>Ubicación:</strong> {{ $user['location'] }}</p>
                <p><strong>Fecha de nacimiento:</strong> {{ $user['birth_date'] }}</p>
            </div>
        </div>
    </div>
@endsection
