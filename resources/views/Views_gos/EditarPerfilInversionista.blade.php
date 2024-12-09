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
    <form action="{{ route('perfilInver.update') }}" method="POST">
        @csrf
        @method('PUT') <!-- Esto indica que es una solicitud PUT -->

        <div>
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}" required>
        </div>

        <div>
            <label for="email">Correo:</label>
            <input type="email" name="email" id="email" value="{{ $user->email }}" required>
        </div>

        <div>
            <label for="birthdate">Fecha de nacimiento:</label>
            <input type="date" name="birthdate" id="birthdate" value="{{ $user->birthdate }}">
        </div>

        <div>
            <label for="location">Ubicación:</label>
            <input type="text" name="location" id="location" value="{{ $user->location }}">
        </div>

        <div>
            <label for="phone">Teléfono:</label>
            <input type="text" name="phone" id="phone" value="{{ $user->phone }}">
        </div>

        <div>
            <label for="gender">Género:</label>
            <select name="gender" id="gender">
                <option value="Masculino" {{ $user->gender == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                <option value="Femenino" {{ $user->gender == 'Femenino' ? 'selected' : '' }}>Femenino</option>
            </select>
        </div>

        <button type="submit">Guardar cambios</button>
    </form>


    <script>
        // Manejo del modal para la foto de perfil
        function openPhotoModal() {
            alert('Función para cambiar la foto de perfil.');
        }
    </script>
</body>
</html>
