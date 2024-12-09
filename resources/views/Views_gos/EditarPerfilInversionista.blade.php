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
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @php
        $userData = $user ?? [];
    @endphp

    <form id="profile-form" class="profile-container" action="{{ route('perfilInver.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Foto de perfil -->
        <div class="profile-banner">
            <div class="profile-img" onclick="openPhotoModal()">
                <img id="profile-photo"
                     src="{{ $userData['photo'] ?? 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png' }}"
                     alt="Foto de perfil">
            </div>
        </div>

        <!-- Información editable -->
        <div class="profile-info">
            <div class="info-group">
                <label><i class="fas fa-user"></i> Nombre:</label>
                <input type="text" name="name" value="{{ old('name', $userData['name'] ?? '') }}" required>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="info-group">
                <label><i class="fas fa-calendar"></i> Fecha de nacimiento:</label>
                <input type="date" name="birthdate"
                       value="{{ old('birthdate', isset($userData['birthdate']) ? \Carbon\Carbon::parse($userData['birthdate'])->format('Y-m-d') : '') }}"
                       required>
                @error('birthdate')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="info-group">
                <label><i class="fas fa-envelope"></i> Correo:</label>
                <input type="email" name="email" value="{{ old('email', $userData['email'] ?? '') }}" required>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="info-group">
                <label><i class="fas fa-map-marker-alt"></i> Ubicación:</label>
                <input type="text" name="location" value="{{ old('location', $userData['location'] ?? '') }}" required>
                @error('location')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="info-group">
                <label><i class="fas fa-phone"></i> Celular:</label>
                <input type="tel" name="phone"
                       value="{{ old('phone', $userData['phone'] ?? '') }}"
                       required
                       pattern="[0-9]{10}"
                       maxlength="10">
                @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="info-group">
                <label><i class="fas fa-venus-mars"></i> Género:</label>
                <select name="gender" required>
                    <option value="Masculino"
                        {{ old('gender', $userData['gender'] ?? '') == 'Masculino' ? 'selected' : '' }}>
                        Masculino
                    </option>
                    <option value="Femenino"
                        {{ old('gender', $userData['gender'] ?? '') == 'Femenino' ? 'selected' : '' }}>
                        Femenino
                    </option>
                    <option value="Otro"
                        {{ old('gender', $userData['gender'] ?? '') == 'Otro' ? 'selected' : '' }}>
                        Otro
                    </option>
                </select>
                @error('gender')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="info-group">
                <label><i class="fas fa-file-pdf"></i> Certificado de Inversión:</label>
                <input type="file" name="investment_certificate" accept=".pdf">
                @error('investment_certificate')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="info-group">
                <label><i class="fas fa-id-card"></i> Documento:</label>
                <input type="text" name="document"
                       value="{{ old('document', $userData['document'] ?? '') }}"
                       required
                       pattern="[0-9]{10,15}"
                       minlength="10"
                       maxlength="15">
                @error('document')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
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
        function openPhotoModal() {
            alert('Próximamente: Función para cambiar la foto de perfil.');
        }
    </script>
</body>
</html>
