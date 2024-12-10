@extends('layouts.Nav-Bar_Inversionista')
@extends('layouts.Footer_Inversor')
<!DOCTYPE html>
<html lang="es">
<head>
    <!-- ... (head content remains the same) ... -->
</head>
<body>
    <main class="profile-container">
        @if($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('perfilInver.update', ['investor' => $investor_id]) }}" method="POST">
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
                <!-- ... (rest of the form remains the same) ... -->
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
