@extends('layouts.Nav-Bar_Inversionista')
@extends('layouts.Footer_Inversor')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil - Emprende Link</title>
    <link rel="stylesheet" href="{{ asset('/css/perfilEditarInversionista.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <form id="profile-form" class="profile-container" action="{{ route('perfilInver.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Foto de perfil, la cual no debe estar relacionada con la edición de texto -->
        <div class="profile-banner">
            <div class="profile-img" onclick="openPhotoModal()">
                <img id="profile-photo" src="{{ $user->photo ?? 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png' }}" alt="Foto de perfil">
            </div>
        </div>

        <!-- Información editable -->
        <div class="profile-info">
            <div class="info-group">
                <label><i class="fas fa-user"></i> Nombre:</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
                <span class="error">El nombre es requerido</span>
            </div>

            <div class="info-group">
                <label><i class="fas fa-calendar"></i> Fecha de nacimiento:</label>
                <input type="date" name="birthdate" value="{{ old('birthdate', $user->birthdate) }}" required>
                <span class="error">La fecha de nacimiento es requerida</span>
            </div>

            <div class="info-group">
                <label><i class="fas fa-envelope"></i> Correo:</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
                <span class="error">Ingrese un correo válido</span>
            </div>

            <div class="info-group">
                <label><i class="fas fa-map-marker-alt"></i> Ubicación:</label>
                <input type="text" name="location" value="{{ old('location', $user->location) }}" required>
                <span class="error">La ubicación es requerida</span>
            </div>

            <div class="info-group">
                <label><i class="fas fa-phone"></i> Celular:</label>
                <input type="tel" name="phone" value="{{ old('phone', $user->phone) }}" required pattern="[0-9]{10}">
                <span class="error">Ingrese un número de celular válido (10 dígitos)</span>
            </div>

            <div class="info-group">
                <label><i class="fas fa-venus-mars"></i> Género:</label>
                <select name="gender" required>
                    <option value="Masculino" {{ old('gender', $user->gender) == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                    <option value="Femenino" {{ old('gender', $user->gender) == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                    <option value="Otro" {{ old('gender', $user->gender) == 'Otro' ? 'selected' : '' }}>Otro</option>
                </select>
                <span class="error">Seleccione un género</span>
            </div>

            <div class="info-group">
                <label><i class="fas fa-file-pdf"></i> Certificado de Inversión:</label>
                <input type="file" name="investment_certificate" accept=".pdf">
                <span class="error">Debe adjuntar un archivo en formato PDF si no se escribe la experiencia</span>
            </div>

            <div class="info-group">
                <label><i class="fas fa-id-card"></i> Documento:</label>
                <input type="text" name="document" value="{{ old('document', $user->document) }}" required pattern="[0-9]{10,15}">
                <span class="error">Ingrese un número de documento válido</span>
            </div>
        </div>

        <div class="profile-actions">
            <button type="submit" class="btn-primary">Guardar cambios</button>
            <a href="{{ route('perfilInver.index') }}">
                <button type="button" class="btn-outline">Cancelar</button>
            </a>
        </div>
    </form>

    <script>
        // Manejo del modal para la foto de perfil
        function openPhotoModal() {
            alert('Función para cambiar la foto de perfil.');
        }
    </script>
</body>
</html>
