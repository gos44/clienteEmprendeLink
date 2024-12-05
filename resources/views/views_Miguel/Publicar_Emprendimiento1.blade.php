@extends('layouts.Nav-Bar_Usuario')
@extends('layouts.Footer_Usuario')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicar Emprendimiento</title>
    <link rel="stylesheet" href="{{ asset('css/Publicar_Emprendimiento1.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Publicar_Emprendimiento2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Publicar_Emprendimiento3.css') }}">
</head>
<body>
    <br><br>
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

        <form method="POST" action="{{ route('guardarEmprendimiento') }}" enctype="multipart/form-data" id="emprendimiento-form">
            @csrf

            <!-- Campo oculto para el ID del emprendedor -->
            {{-- <input type="hidden" name="entrepreneurs_id" value="{{ Auth::user()->id }}"> --}}
            {{-- <input type="id" name="entrepreneurs_id" value="{{ Auth::check() ? Auth::user()->id : '' }}"> --}}
            <input type="hidden" name="entrepreneurs_id" value="{{ Auth::check() ? Auth::user()->id : '' }}">

            <!-- Paso 1: Información básica -->
            <div class="form-section">
                <div class="form-group">
                    <label for="name">Nombre del Emprendimiento</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <label for="slogan">Escribe tu eslogan</label>
                    <textarea id="slogan" name="slogan" required>{{ old('slogan') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="category">Categoría</label>
                    <select id="category" name="category" required>
                        <option value="">Seleccione una categoría</option>
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

                        <!-- Más categorías... -->
                    </select>
                </div>
            </div>

            <!-- Paso 2: Imágenes y Productos -->
            <div class="form-section">
                <div class="form-group">
                    <label for="logo_path">Elige tu logo (Debe ser cuadrado)</label>
                    <input type="file" id="logo_path" name="logo_path" accept="image/*" required>
                </div>
                <div class="form-group">
                    <label for="background">Elige una portada (Debe ser rectangular)</label>
                    <input type="file" id="background" name="background" accept="image/*" required>
                </div>
                <div class="form-group">
                    <label for="products">Añade productos con sus detalles</label>
                    <div class="product-container" id="product-container">
                        <div class="product-item">
                            <input type="file" name="product_images[]" class="product-image-input" accept="image/*" required multiple>
                            <input type="text" name="name_products" placeholder="Nombres de los productos (separados por comas)" required>
                            <textarea name="product_descriptions" placeholder="Descripciones de los productos (separadas por comas)" rows="4" required></textarea>
                        </div>
                    </div>
                    <button type="button" id="add-product" class="btn-agregar-producto">+ Agregar Producto</button>
                </div>
            </div>

            <!-- Paso 3: Descripción general -->
            <div class="form-section">
                <div class="form-group">
                    <label for="general_description">Añade una gran descripción general de todo tu emprendimiento</label>
                    <textarea id="general_description" name="general_description" required>{{ old('general_description') }}</textarea>
                </div>
            </div>

            <button type="submit" class="btn-publicar" id="publicarBtn">Publicar</button>
        </form>
    </div>
</body>
</html>
