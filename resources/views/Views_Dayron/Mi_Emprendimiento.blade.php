@extends('layouts.Nav-Bar_Usuario')
@extends('layouts.Footer_Usuario')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $emprendimiento->name }} - Mercado de Vinos</title>
    <link rel="stylesheet" href="{{ asset('css/Mi_Emprendimiento.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<main>
    <div class="main-content">
        <section class="hero">
            <div class="hero-background">
                <img src="{{ asset('images/'.$emprendimiento->background) }}" alt="{{ $emprendimiento->name }}">
            </div>
            <div class="hero-overlay"></div>
            <div class="hero-content">
                <div class="hero-main">
                    <img src="{{ asset('images/'.$emprendimiento->logo_path) }}" alt="{{ $emprendimiento->name }} Logo" class="hero-logo">
                    <h1>{{ $emprendimiento->name }}</h1>
                    <p class="hero-quote">{{ $emprendimiento->slogan }}</p>
                </div>
            </div>
        </section>

        <section class="profile">
            <div class="profile-card">
                <h2>Descripción General</h2>
                <p>{{ $emprendimiento->general_description }}</p>
            </div>
        </section>

        <div class="content">
            <section class="products">
                <h3>Productos</h3>
                @foreach($emprendimiento->name_products as $index => $name)
                <div class="product">
                    <img src="{{ asset('images/'.$emprendimiento->product_images[$index]) }}" alt="{{ $name }}">
                    <div class="product-info">
                        <h4>{{ $name }}</h4>
                        <p>{{ $emprendimiento->product_descriptions[$index] }}</p>
                    </div>
                </div>
                @endforeach
            </section>
        </div>
    </div>
</main>
</body>
</html>
