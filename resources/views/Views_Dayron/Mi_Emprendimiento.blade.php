@extends('layouts.Nav-Bar_Usuario')
@extends('layouts.Footer_Usuario')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $emprendimiento->name ?? 'Emprendimiento' }} - Mercado de Vinos</title>
    <link rel="stylesheet" href="{{ asset('css/Mi_Emprendimiento.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<main>
    <div class="main-content">
        <section class="hero">
            <div class="hero-background">
                <img src="{{ isset($emprendimiento->background) ? asset('images/'.$emprendimiento->background) : asset('images/default-background.png') }}" alt="{{ $emprendimiento->name ?? 'Emprendimiento' }}">
            </div>
            <div class="hero-overlay"></div>
            <div class="hero-content">
                <div class="hero-main">
                    <img src="{{ isset($emprendimiento->logo_path) ? asset('images/'.$emprendimiento->logo_path) : asset('images/default-logo.png') }}" alt="{{ $emprendimiento->name ?? 'Logo' }} Logo" class="hero-logo">
                    <h1>{{ $emprendimiento->name ?? 'Nombre del Emprendimiento' }}</h1>
                    <p class="hero-quote">{{ $emprendimiento->slogan ?? 'Slogan del emprendimiento' }}</p>
                </div>
            </div>
        </section>
Copy    <section class="profile">
        <div class="profile-card">
            <img src="{{ isset($emprendimiento->owner_image) ? asset('images/'.$emprendimiento->owner_image) : asset('images/default-profile.png') }}" alt="{{ $emprendimiento->owner_name ?? 'Nombre del Dueño' }}" class="profile-image">
            <div class="profile-info">
                <h2>{{ $emprendimiento->owner_name ?? 'Nombre del Dueño' }}</h2>
                <p><i class="fas fa-envelope"></i> <a href="mailto:{{ $emprendimiento->email ?? '' }}">{{ $emprendimiento->email ?? 'Correo no disponible' }}</a></p>
                <p><i class="fas fa-map-marker-alt"></i> {{ $emprendimiento->address ?? 'Dirección no disponible' }}</p>
                <p><i class="fas fa-phone"></i> {{ $emprendimiento->phone ?? 'Teléfono no disponible' }}</p>
                <p><i class="fas fa-city"></i> {{ $emprendimiento->city ?? 'Ciudad no disponible' }}</p>
            </div>
        </div>
    </section>

    <div class="hero-buttons">
        <a href="{{ route('resena') }}" class="btn btn-primary">Reseñas</a>
        <a href="{{ route('Editar_Emprendimiento_2.index') }}" class="btn btn-secondary">Editar</a>
    </div>

    <div class="content">
        <section class="products">
            @if(isset($emprendimiento->name_products) && is_array($emprendimiento->name_products) && count($emprendimiento->name_products) > 0)
                @foreach($emprendimiento->name_products as $index => $name)
                <div class="product">
                    <img src="{{ isset($emprendimiento->product_images[$index]) ? asset('images/'.$emprendimiento->product_images[$index]) : asset('images/default-product.png') }}" alt="{{ $name ?? 'Producto' }}">
                    <div class="product-info">
                        <h4>{{ $name ?? 'Nombre del Producto' }}</h4>
                        <p>{{ $emprendimiento->product_descriptions[$index] ?? 'Descripción no disponible' }}</p>
                    </div>
                </div>
                @endforeach
            @else
                <p>No hay productos disponibles</p>
            @endif
        </section>

        <section class="description">
            <h3>Descripción</h3>
            <p>{{ $emprendimiento->description ?? 'No se ha proporcionado una descripción del emprendimiento.' }}</p>
        </section>
    </div>
</div>
</main>
</body>
</html>
