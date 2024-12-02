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
                <img src="{{ asset('images/'.$emprendimiento->image) }}" alt="{{ $emprendimiento->name }}">
            </div>
            <div class="hero-overlay"></div>
            <div class="hero-content">
                <div class="hero-main">
                    <img src="{{ asset('images/'.$emprendimiento->logo) }}" alt="{{ $emprendimiento->name }} Logo" class="hero-logo">
                    <h1>{{ $emprendimiento->name }}</h1>
                    <p class="hero-quote">{{ $emprendimiento->quote }}</p>
                </div>
            </div>
        </section>

        <section class="profile">
            <div class="profile-card">
                <img src="{{ asset('images/'.$emprendimiento->profile_image) }}" alt="{{ $emprendimiento->owner }}" class="profile-image">
                <div class="profile-info">
                    <h2>{{ $emprendimiento->owner }}</h2>
                    <p><i class="fas fa-envelope"></i> <a href="mailto:{{ $emprendimiento->email }}">{{ $emprendimiento->email }}</a></p>
                    <p><i class="fas fa-map-marker-alt"></i> {{ $emprendimiento->location }}</p>
                    <p><i class="fas fa-phone"></i> {{ $emprendimiento->phone }}</p>
                    <p><i class="fas fa-city"></i> {{ $emprendimiento->city }}</p>
                </div>
            </div>
        </section>

        <div class="hero-buttons">
            <a href="{{ route('resena') }}" class="btn btn-primary">Reseñas</a>
            <a href="{{ route('Editar_Emprendimiento.index') }}" class="btn btn-secondary">Editar</a>
        </div>

        <div class="content">
            <section class="products">
                @foreach($emprendimiento->products as $product)
                <div class="product">
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
                    <div class="product-info">
                        <h4>{{ $product->name }}</h4>
                        <p>{{ $product->description }}</p>
                    </div>
                </div>
                @endforeach
            </section>

            <section class="description">
                <h3>Descripción</h3>
                <p>{{ $emprendimiento->description }}</p>
            </section>
        </div>
    </div>
</main>
</body>
</html>
