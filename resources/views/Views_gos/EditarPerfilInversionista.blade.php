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

        <form action="{{ route('perfilInver.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="profile-banner">
                <div class="profile-img">
                    <img id="profile-image"
                         src="{{ $user['image'] ?? 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png' }}"
                         alt="Foto de perfil">
                    <input type="file" name="image" class="form-control mt-2">
                </div>
            </div>

            <div class="profile-info">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ $user['name'] }}">
                </div>
                <div class="form-group">
                    <label for="lastname">Apellido</label>
                    <input type="text" id="lastname" name="lastname" class="form-control" value="{{ $user['lastname'] }}">
                </div>
                <div class="info-group">
                    <label><i class="fas fa-calendar"></i> Fecha de nacimiento:</label>
                    <input type="date" name="birth_date" class="form-control" value="{{ $user['birth_date'] ?? '' }}">
                </div>

                <div class="info-group">
                    <label><i class="fas fa-envelope"></i> Correo:</label>
                    <input type="email" name="email" class="form-control" value="{{ $user['email'] ?? 'No disponible' }}">
                </div>

                <div class="info-group">
                    <label><i class="fas fa-map-marker-alt"></i> Ubicación:</label>
                    <input type="text" name="location" class="form-control" value="{{ $user['location'] ?? 'No disponible' }}">
                </div>

                <div class="info-group">
                    <label><i class="fas fa-phone"></i> Celular:</label>
                    <input type="tel" name="phone" class="form-control" value="{{ $user['phone'] ?? 'No disponible' }}">
                </div>

                <div class="info-group">
                    <label><i class="fas fa-id-card"></i> Documento:</label>
                    <input type="text" name="number" class="form-control" value="{{ $user['number'] ?? 'No disponible' }}">
                </div>
            </div>

            <div class="profile-actions">
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                <a href="{{ route('Home1.index') }}" class="btn btn-outline-secondary">Cancelar</a>
            </div>
        </form>
    </main>

    <script>
        // Script para previsualizar imagen de perfil
        document.querySelector('input[type="file"]').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById('profile-image').src = e.target.result;
            }

            reader.readAsDataURL(file);
        });
    </script>
</body>
</html>
