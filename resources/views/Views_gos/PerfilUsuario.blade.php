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
                <img id="profile-image" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="Foto de perfil">
            </div>
        </div>

        <div class="profile-info">
            <div class="info-group">
                <label><i class="fas fa-user"></i> Nombre:</label>
                <input type="text" id="name" readonly>
            </div>
            <div class="info-group">
                <label><i class="fas fa-user"></i> Apellido:</label>
                <input type="text" id="lastname" readonly>
            </div>
            <div class="info-group">
                <label><i class="fas fa-calendar"></i> Fecha de nacimiento:</label>
                <input type="text" id="birth_date" readonly>
            </div>
            <div class="info-group">
                <label><i class="fas fa-envelope"></i> Correo:</label>
                <input type="email" id="email" readonly>
            </div>
            <div class="info-group">
                <label><i class="fas fa-map-marker-alt"></i> Ubicación:</label>
                <input type="text" id="location" readonly>
            </div>
            <div class="info-group">
                <label><i class="fas fa-phone"></i> Celular:</label>
                <input type="tel" id="phone" readonly>
            </div>
            <div class="info-group">
                <label><i class="fas fa-id-card"></i> Número:</label>
                <input type="text" id="number" readonly>
            </div>
            <div class="info-group">
                <label><i class="fas fa-id-card"></i> Documento:</label>
                <input type="text" id="document_id" readonly>
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

    <script>
        document.addEventListener('DOMContentLoaded', async function () {
            try {
                // Obtener el token de autenticación desde localStorage
                const token = localStorage.getItem('token');
                if (!token) {
                    alert('No se encontró el token de autenticación.');
                    window.location.href = '/login';
                    return;
                }

                // Realizar la solicitud al endpoint para obtener los datos del usuario
                const response = await fetch('https://clienteemprendelink-production.up.railway.app/api/auth/me', {
                    method: 'POST',
                    headers: {
                        'Authorization': `Bearer ${token}`,
                        'Content-Type': 'application/json',
                    },
                });

                if (!response.ok) {
                    alert('Error al obtener los datos del usuario.');
                    window.location.href = '/login';
                    return;
                }

                const user = await response.json();

                // Rellenar los campos con los datos obtenidos
                document.getElementById('name').value = user.name || 'No disponible';
                document.getElementById('lastname').value = user.lastname || 'No disponible';
                document.getElementById('birth_date').value = user.birth_date || 'No disponible';
                document.getElementById('email').value = user.email || 'No disponible';
                document.getElementById('location').value = user.location || 'No disponible';
                document.getElementById('phone').value = user.phone || 'No disponible';
                document.getElementById('number').value = user.number || 'No disponible';
                document.getElementById('document_id').value = user.document_id || 'No disponible';
                document.getElementById('profile-image').src = user.image || 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png';
            } catch (error) {
                console.error('Error:', error);
                alert('Hubo un problema al cargar los datos del usuario.');
            }
        });
    </script>
</body>
</html>
