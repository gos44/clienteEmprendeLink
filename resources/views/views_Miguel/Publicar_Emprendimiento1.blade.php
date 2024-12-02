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
    <br><br>
    <h1>¡Vamos a crear tu emprendimiento!</h1>

    <div class="navigation">
        <div class="page active">1</div>
        <div class="line"></div>
        <div class="page">2</div>
        <div class="line"></div>
        <div class="page">3</div>
    </div>

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

        <form action="{{ route('guardarPaso1') }}" method="POST">
            @csrf
            <div class="form-sections">
                <div class="form-section">
                    <div class="form-group">
                        <label for="name">Nombre del Emprendimiento</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="slogan">Escribe tu eslogan</label>
                        <textarea id="slogan" name="slogan" required>{{ old('slogan') }}</textarea>
                    </div>
                </div>
                <div class="form-section">
                    <div class="form-group">
                        <label for="category">Categoría</label>
                        <select id="category" name="category" required>
                            <option value="">Seleccione una categoría</option>
                            <option value="articulos_deportivos" {{ old('category') == 'articulos_deportivos' ? 'selected' : '' }}>Artículos deportivos</option>
                            <option value="articulos_hogar" {{ old('category') == 'articulos_hogar' ? 'selected' : '' }}>Artículos para el hogar</option>
                            <option value="electronica" {{ old('category') == 'electronica' ? 'selected' : '' }}>Electrónica</option>
                            <option value="indumentaria" {{ old('category') == 'indumentaria' ? 'selected' : '' }}>Indumentaria</option>
                            <option value="instrumentos_musicales" {{ old('category') == 'instrumentos_musicales' ? 'selected' : '' }}>Instrumentos musicales</option>
                            <option value="mascotas" {{ old('category') == 'mascotas' ? 'selected' : '' }}>Productos de mascotas</option>
                            <option value="oficina" {{ old('category') == 'oficina' ? 'selected' : '' }}>Suministros de oficina</option>
                            <option value="artesanias" {{ old('category') == 'artesanias' ? 'selected' : '' }}>Artesanías</option>
                            <option value="herramientas" {{ old('category') == 'herramientas' ? 'selected' : '' }}>Herramientas de trabajo</option>
                            <option value="educacion" {{ old('category') == 'educacion' ? 'selected' : '' }}>Educación</option>
                            <option value="alimentacion" {{ old('category') == 'alimentacion' ? 'selected' : '' }}>Alimentación</option>
                            <option value="vehiculos" {{ old('category') == 'vehiculos' ? 'selected' : '' }}>Vehículos</option>
                        </select>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn-publicar">Siguiente</button>
        </form>
    </div>
</body>
</html>
