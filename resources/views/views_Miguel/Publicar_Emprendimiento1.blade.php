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

        <form method="POST" action="{{ route('Publicar_Emprendimiento1') }}">
            @csrf
            <div class="form-sections">
                <div class="form-section">
                    <div class="form-group">
                        <label for="nombre_emprendimiento">Nombre del Emprendimiento</label>
                        <input type="text" id="nombre_emprendimiento" name="nombre_emprendimiento" 
                               value="{{ old('nombre_emprendimiento', session('entrepreneurship.name')) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Escribe tu eslogan</label>
                        <textarea id="descripcion" name="descripcion" required>{{ old('descripcion', session('entrepreneurship.description')) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="especificaciones">Especificaciones</label>
                        <textarea id="especificaciones" name="especificaciones">{{ old('especificaciones', session('entrepreneurship.specifications')) }}</textarea>
                    </div>
                </div>
                <div class="form-section">
                    <div class="form-group">
                        <label for="categoria">Categoría</label>
                        <select id="categoria" name="categoria" required>
                            <option value="">Seleccione una categoría</option>
                            <option value="articulos_deportivos" {{ (old('categoria', session('entrepreneurship.category')) == 'articulos_deportivos') ? 'selected' : '' }}>Artículos deportivos</option>
                            <option value="articulos_hogar" {{ (old('categoria', session('entrepreneurship.category')) == 'articulos_hogar') ? 'selected' : '' }}>Artículos para el hogar</option>
                            <option value="electronica" {{ (old('categoria', session('entrepreneurship.category')) == 'electronica') ? 'selected' : '' }}>Electrónica</option>
                            <option value="indumentaria" {{ (old('categoria', session('entrepreneurship.category')) == 'indumentaria') ? 'selected' : '' }}>Indumentaria</option>
                            <option value="instrumentos_musicales" {{ (old('categoria', session('entrepreneurship.category')) == 'instrumentos_musicales') ? 'selected' : '' }}>Instrumentos musicales</option>
                            <option value="mascotas" {{ (old('categoria', session('entrepreneurship.category')) == 'mascotas') ? 'selected' : '' }}>Productos de mascotas</option>
                            <option value="oficina" {{ (old('categoria', session('entrepreneurship.category')) == 'oficina') ? 'selected' : '' }}>Suministros de oficina</option>
                            <option value="artesanias" {{ (old('categoria', session('entrepreneurship.category')) == 'artesanias') ? 'selected' : '' }}>Artesanías</option>
                            <option value="herramientas" {{ (old('categoria', session('entrepreneurship.category')) == 'herramientas') ? 'selected' : '' }}>Herramientas de trabajo</option>
                            <option value="educacion" {{ (old('categoria', session('entrepreneurship.category')) == 'educacion') ? 'selected' : '' }}>Educación</option>
                            <option value="alimentacion" {{ (old('categoria', session('entrepreneurship.category')) == 'alimentacion') ? 'selected' : '' }}>Alimentación</option>
                            <option value="vehiculos" {{ (old('categoria', session('entrepreneurship.category')) == 'vehiculos') ? 'selected' : '' }}>Vehículos</option>
                        </select>
                    </div>
                </div>
            </div>
           
            <button type="submit" class="btn-publicar">Siguiente</button>
        </form>
    </div>
</body>
</html>