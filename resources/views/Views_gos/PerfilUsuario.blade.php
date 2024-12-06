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
        @if($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <div class="profile-banner">
            <div class="profile-img">
                <img id="profile-image"
                     src="{{ $user['image'] ?? 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png' }}"
                     alt="Foto de perfil">
            </div>
        </div>

        <div class="profile-info">
            <div class="info-group">
                <label><i class="fas fa-user"></i> Nombre:</label>
                <input type="text" id="name" value="{{ $user['name'] ?? 'No disponible' }}" readonly>
            </div>
            <div class="info-group">
                <label><i class="fas fa-user"></i> Apellido:</label>
                <input type="text" id="lastname" value="{{ $user['lastname'] ?? 'No disponible' }}" readonly>
            </div>
            <div class="info-group">
                <label><i class="fas fa-calendar"></i> Fecha de nacimiento:</label>
                <input type="text" id="birth_date" value="{{ $user['birth_date'] ?? 'No disponible' }}" readonly>
            </div>
            <div class="info-group">
                <label><i class="fas fa-envelope"></i> Correo:</label>
                <input type="email" id="email" value="{{ $user['email'] ?? 'No disponible' }}" readonly>
            </div>
            <div class="info-group">
                <label><i class="fas fa-map-marker-alt"></i> Ubicación:</label>
                <input type="text" id="location" value="{{ $user['location'] ?? 'No disponible' }}" readonly>
            </div>
            <div class="info-group">
                <label><i class="fas fa-phone"></i> Celular:</label>
                <input type="tel" id="phone" value="{{ $user['phone'] ?? 'No disponible' }}" readonly>
            </div>
            <div class="info-group">
                <label><i class="fas fa-id-card"></i> Documento:</label>
                <input type="text" id="number" value="{{ $user['number'] ?? 'No disponible' }}" readonly>
            </div>

        </div>

        <div class="profile-actions">
            <a href="{{ route('perfilUser.index') }}">
                <button class="btn-primary">Editar perfil</button>
            </a>
            <a href="#" id="logoutBtn">
                <button class="btn-outline">Cerrar Sesión</button>
            </a>

        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    // Agregar el evento de click al botón de logout
    document.getElementById('logoutBtn').addEventListener('click', function(event) {
        event.preventDefault();  // Evitar la acción predeterminada del enlace

        // Realizar la solicitud POST al endpoint de logout
        axios.post('https://apiemprendelink-production-9272.up.railway.app/api/auth/logout', {}, {
    headers: {
        'Authorization': 'Bearer ' + localStorage.getItem('token')  // Suponiendo que el token está guardado en localStorage
    }
})
        .then(response => {
            // Si el logout fue exitoso, mostrar mensaje en consola o en la interfaz
            console.log(response.data.message);

            // Eliminar el token de localStorage
            localStorage.removeItem('token');

            // Redirigir al usuario a la página principal o página de inicio
            window.location.href = '{{ route('Home1.index') }}';
        })
        .catch(error => {
            // Si hay un error, mostrarlo en consola o alertar al usuario
            console.error('Error al cerrar sesión:', error);
            alert('Hubo un problema al cerrar sesión');
        });
    });
</script>

</body>
</html>
