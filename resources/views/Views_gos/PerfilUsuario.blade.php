@extends('layouts.Nav-Bar_Usuario')
@extends('layouts.Footer_Usuario')

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
        <div class="profile-banner">
            <div class="profile-img">
                <img src="{{ $connections['user']['image'] ?? 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png' }}" alt="Foto de perfil">
            </div>
        </div>

        <div class="profile-info">
            <div class="info-group">
                <label><i class="fas fa-user"></i> Nombre:</label>
                <input type="text" value="{{ $connections['user']['name'] ?? 'No disponible' }}" readonly>
            </div>
            <div class="info-group">
                <label><i class="fas fa-calendar"></i> Fecha de nacimiento:</label>
                <input type="text" value="{{ $connections['user']['birth_date'] ?? 'No disponible' }}" readonly>
            </div>
            <div class="info-group">
                <label><i class="fas fa-envelope"></i> Correo:</label>
                <input type="email" value="{{ $connections['user']['email'] ?? 'No disponible' }}" readonly>
            </div>
            <div class="info-group">
                <label><i class="fas fa-map-marker-alt"></i> Ubicación:</label>
                <input type="text" value="{{ $connections['user']['location'] ?? 'No disponible' }}" readonly>
            </div>
            <div class="info-group">
                <label><i class="fas fa-phone"></i> Celular:</label>
                <input type="tel" value="{{ $connections['user']['phone'] ?? 'No disponible' }}" readonly>
            </div>
            <div class="info-group">
                <label><i class="fas fa-id-card"></i> Documento:</label>
                <input type="text" value="{{ $connections['id'] ?? 'No disponible' }}" readonly>
            </div>
        </div>

        <div class="profile-actions">
            <a href="{{ route('perfilUser.index') }}">
                <button class="btn-primary">Editar perfil</button>
            </a>
            <a href="{{ route('Home1.index') }}">
                <button class="btn-outline">Cerrar Sesión</button>
            </a>
        </div>
    </main>
</body>
</html>
