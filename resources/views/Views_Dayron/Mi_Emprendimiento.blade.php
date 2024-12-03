@extends('layouts.Nav-Bar_Usuario')
@extends('layouts.Footer_Usuario')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $emprendimiento->name }} - {{ $emprendimiento->category }}</title>

    <link rel="stylesheet" href="{{ asset('css/Mi_Emprendimiento.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>


<body>
    <div class="emprendimiento-details">
        <h1>{{ $emprendimiento->name }}</h1>
        <h2>{{ $emprendimiento->slogan }}</h2>
        <p><strong>Categoría:</strong> {{ $emprendimiento->category }}</p>
        <p><strong>Descripción general:</strong> {{ $emprendimiento->general_description }}</p>

        <!-- Imagen de fondo -->
        <div class="background-image" style="background-image: url('{{ $emprendimiento->background }}');">
            <!-- Puedes agregar un overlay o más detalles aquí si lo deseas -->
        </div>

        <!-- Logo -->
        <div class="logo">
            <img src="{{ $emprendimiento->logo_path }}" alt="Logo de {{ $emprendimiento->name }}">
        </div>

        <!-- Productos -->
        <div class="productos">
            <h3>Productos</h3>
            @foreach($emprendimiento->name_products as $index => $product)
                <div class="producto">
                    <h4>{{ $product }}</h4>
                    <img src="{{ $emprendimiento->product_images[$index] }}" alt="{{ $product }}">
                    <p>{{ $emprendimiento->product_descriptions[$index] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
