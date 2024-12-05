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
            <input type="hidden" name="entrepreneurs_id" value="{{ Auth::check() ? Auth::user()->id : '' }}">

            <div class="form-section">
                <label for="name">Nombre del Emprendimiento</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>

                <label for="slogan">Eslogan</label>
                <textarea id="slogan" name="slogan" required>{{ old('slogan') }}</textarea>

                <label for="category">Categoría</label>
                <select id="category" name="category" required>
                    <option value="">Seleccione una categoría</option>
                    <option value="articulos_hogar" {{ old('category') == 'articulos_hogar' ? 'selected' : '' }}>Artículos para el hogar</option>
                    <!-- Más categorías -->
                </select>
            </div>

            <div class="form-section">
                <label for="logo_path">Logo</label>
                <input type="file" id="logo_path" name="logo_path" accept="image/*" required>

                <label for="background">Portada</label>
                <input type="file" id="background" name="background" accept="image/*" required>

                <label for="product_images">Productos</label>
                <input type="file" id="product_images" name="product_images[]" multiple accept="image/*" required>

                <label for="name_products">Nombres de los productos</label>
                <input type="text" id="name_products" name="name_products" placeholder="Ej: Producto1, Producto2" required>

                <label for="product_descriptions">Descripciones de los productos</label>
                <textarea id="product_descriptions" name="product_descriptions" placeholder="Ej: Descripción1, Descripción2" required></textarea>
            </div>

            <label for="general_description">Descripción general</label>
            <textarea id="general_description" name="general_description" required>{{ old('general_description') }}</textarea>

            <button type="submit" class="btn-publicar">Publicar</button>
        </form>
    </div>
</body>
</html>
