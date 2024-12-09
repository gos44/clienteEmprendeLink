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

    <form id="profile-form" class="profile-container" action="{{ route('perfilInver.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Validate existing error messages -->
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Rest of your previous HTML remains the same -->
        <div class="profile-banner">
            <div class="profile-img" onclick="openPhotoModal()">
                <img id="profile-photo"
                     src="{{ $user['photo'] ?? 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png' }}"
                     alt="Foto de perfil">
            </div>
        </div>

        <div class="profile-info">
            <!-- Fields remain same as your original, just add `@error` directives -->
            <div class="info-group">
                <label><i class="fas fa-user"></i> Nombre:</label>
                <input type="text" name="name" value="{{ old('name', $user['name']) }}" required>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Repeat similar error handling for other fields -->
            <!-- Other fields remain the same as your original HTML -->
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
            // Implementar lógica para cambiar foto de perfil
            alert('Próximamente: Función para cambiar la foto de perfil.');
        }
    </script>
</body>
</html>
