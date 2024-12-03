@extends('layouts.Nav-Bar_Usuario')
@extends('layouts.Footer_Usuario')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicar Emprendimiento</title>
    <link rel="stylesheet" href="{{ asset('css/Publicar_Emprendimiento1.css') }}">
</head>
<body>
    <h1>¡Vamos a crear tu emprendimiento!</h1>
    <div class="container">
        <h2>Registro de Emprendimiento</h2>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('guardarEmprendimiento') }}" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="name">Nombre del Emprendimiento:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            </div>
            <div>
                <label for="slogan">Eslogan:</label>
                <textarea id="slogan" name="slogan" required>{{ old('slogan') }}</textarea>
            </div>
            <div>
                <label for="category">Categoría:</label>
                <select id="category" name="category" required>
                    <option value="">Seleccione una categoría</option>
                    <option value="articulos_deportivos">Artículos Deportivos</option>
                    <!-- Otras opciones -->
                </select>
            </div>
            <div>
                <label for="logo_path">Logo:</label>
                <input type="file" id="logo_path" name="logo_path" accept="image/*" required>
            </div>
            <div>
                <label for="background">Portada:</label>
                <input type="file" id="background" name="background" accept="image/*" required>
            </div>
            <div>
                <label for="general_description">Descripción:</label>
                <textarea id="general_description" name="general_description" required>{{ old('general_description') }}</textarea>
            </div>
            <button type="submit">Publicar</button>
        </form>
    </div>
</body>
</html>
