@extends('layouts.Nav-Bar_Inversionista')
@extends('layouts.Footer_Inversor')

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Perfil de Usuario - Emprende Link</title>
        <link rel="stylesheet" href="{{ asset('/css/perfil.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
<body>
    <main class="profile-container">
        @if($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form id="profile-form" action="{{ route('perfilUser.update', ['user' => $user['id'] ?? null]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="profile-banner">
                <div class="profile-img">
                    <img id="profile-image"
                         src="{{ $user['image'] ?? 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png' }}"
                         alt="Foto de perfil">
                    <input type="file" name="image" class="form-control mt-2" accept="image/*">
                </div>
            </div>

            <div class="profile-info">
                <div class="info-group">
                    <label><i class="fas fa-user"></i> Nombre:</label>
                    <input type="text" name="name" class="form-control"
                           value="{{ $user['name'] ?? '' }}" id="name">
                </div>
                <div class="info-group">
                    <label><i class="fas fa-user"></i> Apellido:</label>
                    <input type="text" name="lastname" class="form-control"
                           value="{{ $user['lastname'] ?? '' }}" id="lastname">
                </div>
                <div class="info-group">
                    <label><i class="fas fa-calendar"></i> Fecha de nacimiento:</label>
                    <input type="date" name="birth_date" class="form-control"
                           value="{{ $user['birth_date'] ?? '' }}" id="birth_date">
                </div>
                <div class="info-group">
                    <label><i class="fas fa-envelope"></i> Correo:</label>
                    <input type="email" name="email" class="form-control"
                           value="{{ $user['email'] ?? '' }}" id="email">
                </div>
                <div class="info-group">
                    <label><i class="fas fa-map-marker-alt"></i> Ubicación:</label>
                    <input type="text" name="location" class="form-control"
                           value="{{ $user['location'] ?? '' }}" id="location">
                </div>
                <div class="info-group">
                    <label><i class="fas fa-phone"></i> Celular:</label>
                    <input type="tel" name="phone" class="form-control"
                           value="{{ $user['phone'] ?? '' }}" id="phone">
                </div>
                <div class="info-group">
                    <label><i class="fas fa-id-card"></i> Documento:</label>
                    <input type="text" name="number" class="form-control"
                           value="{{ $user['number'] ?? '' }}" id="number">
                </div>
            </div>

            <div class="profile-actions">
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                <a href="{{ route('Home_Usuario.index') }}" class="btn btn-outline-secondary">Cancelar</a>
            </div>
        </form>
    </main>
</body>
</html>
