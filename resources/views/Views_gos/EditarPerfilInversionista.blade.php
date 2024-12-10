@extends('layouts.Nav-Bar_Inversionista')
@extends('layouts.Footer_Inversor')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil - Emprende Link</title>
    <link rel="stylesheet" href="{{ asset('/css/perfil.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Vista de edición de perfil -->
    <main class="profile-container">
        @if($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form id="profile-form" action="{{ route('perfilInver.update', ['investor' => $user['id']]) }}" method="POST" enctype="multipart/form-data">
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
                    <p id="display-name">{{ localStorage.getItem('name') || 'No disponible' }}</p>
                </div>
                <div class="info-group">
                    <label><i class="fas fa-user"></i> Apellido:</label>
                    <p id="display-lastname">{{ localStorage.getItem('lastname') || 'No disponible' }}</p>
                </div>
                <div class="info-group">
                    <label><i class="fas fa-calendar"></i> Fecha de nacimiento:</label>
                    <p id="display-birth_date">{{ localStorage.getItem('birth_date') || 'No disponible' }}</p>
                </div>
                <div class="info-group">
                    <label><i class="fas fa-envelope"></i> Correo:</label>
                    <p id="display-email">{{ localStorage.getItem('email') || 'No disponible' }}</p>
                </div>
                <div class="info-group">
                    <label><i class="fas fa-map-marker-alt"></i> Ubicación:</label>
                    <p id="display-location">{{ localStorage.getItem('location') || 'No disponible' }}</p>
                </div>
                <div class="info-group">
                    <label><i class="fas fa-phone"></i> Celular:</label>
                    <p id="display-phone">{{ localStorage.getItem('phone') || 'No disponible' }}</p>
                </div>
                <div class="info-group">
                    <label><i class="fas fa-id-card"></i> Documento:</label>
                    <p id="display-number">{{ localStorage.getItem('number') || 'No disponible' }}</p>
                </div>
            </div>

            </div>

            <div class="profile-actions">
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                <a href="{{ route('Home1.index') }}" class="btn btn-outline-secondary">Cancelar</a>
            </div>
        </form>
    </main>

    <script>
        // Guardar datos en el localStorage al hacer clic en el botón "Guardar Cambios"
        document.getElementById('profile-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevenir el envío del formulario

            // Guardar los datos en el localStorage
            localStorage.setItem('name', document.getElementById('name').value);
            localStorage.setItem('lastname', document.getElementById('lastname').value);
            localStorage.setItem('birth_date', document.getElementById('birth_date').value);
            localStorage.setItem('email', document.getElementById('email').value);
            localStorage.setItem('location', document.getElementById('location').value);
            localStorage.setItem('phone', document.getElementById('phone').value);
            localStorage.setItem('number', document.getElementById('number').value);

            alert('Cambios guardados');
            // Redirigir a la vista de perfil
            window.location.href = "perfilInver.index"; // Aquí puedes poner la ruta hacia tu perfil
        });
    </script>
</body>
</html>
