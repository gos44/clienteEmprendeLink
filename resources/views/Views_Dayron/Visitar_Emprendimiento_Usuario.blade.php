@extends('layouts.Nav-Bar_Usuario')
@extends('layouts.Footer_Usuario')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emprende Link - Mercado de Vinos</title>
    <link rel="stylesheet" href="{{ asset('css/Mi_Emprendimiento.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <main>
        @if(!empty($emprendimiento))
        <div class="main-content">

            <!-- Hero Section -->
            <section class="hero">
                <div class="hero-background">
                    <img src="{{ $emprendimiento['background'] ?? 'images/FONDO-VINOS.png' }}" alt="Fondo del emprendimiento">
                </div>
                <div class="hero-overlay"></div>
                <div class="hero-content">
                    <div class="hero-main">
                        <img src="{{ $emprendimiento['logo_path'] ?? 'images/LOGO-VINOS.png' }}" alt="Logo del emprendimiento" class="hero-logo">
                        <h1>{{ $emprendimiento['name'] ?? 'Nombre no disponible' }}</h1>
                        <p class="hero-quote">"{{ $emprendimiento['slogan'] ?? 'Frase no disponible' }}"</p>
                    </div>
                </div>
            </section>

            <div class="profile-card">
                <img src="{{ $emprendimiento['profile_image'] ?? 'https://via.placeholder.com/150' }}" alt="{{ $emprendimiento['name'] }}" class="profile-image">
                <div class="profile-info">
                    <h2>{{ $emprendimiento['name'] }}</h2>
                    @if(isset($emprendimiento['email']))
                    <p><i class="fas fa-envelope"></i> {{ $emprendimiento['email'] }}</p>
                    @endif
                    @if(isset($emprendimiento['address']))
                    <p><i class="fas fa-map-marker-alt"></i> {{ $emprendimiento['address'] }}</p>
                    @endif
                    @if(isset($emprendimiento['phone']))
                    <p><i class="fas fa-phone"></i> {{ $emprendimiento['phone'] }}</p>
                    @endif
                    @if(isset($emprendimiento['business_name']))
                    <p><i class="fas fa-store"></i> {{ $emprendimiento['business_name'] }}</p>
                    @endif
                    @if(isset($emprendimiento['website']))
                    <a href="#"><i class="fas fa-link"></i> {{ $emprendimiento['website'] }}</a>
                    @endif
                </div>
            </div>

            <div class="content">
                <!-- Productos Section -->
                <section class="products">
                    <h3>Productos</h3>
                    <div class="product-grid">
                        @if(isset($emprendimiento['name_products']) && is_array($emprendimiento['name_products']))
                            @foreach($emprendimiento['name_products'] as $index => $productName)
                            <div class="product">
                                <img src="{{ $emprendimiento['product_images'][$index] ?? 'https://via.placeholder.com/150' }}" alt="{{ $productName }}">
                                <div class="product-info">
                                    <h4>{{ $productName }}</h4>
                                    <p>{{ $emprendimiento['product_descriptions'][$index] ?? 'Descripción no disponible' }}</p>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <p>No hay productos disponibles</p>
                        @endif
                    </div>
                </section>

                <!-- Descripción del Emprendimiento -->
                <section class="description">
                    <h3>Descripción del Emprendimiento</h3>
                    <p>{{ $emprendimiento['general_description'] ?? 'Descripción no disponible' }}</p>
                </section>
            </div>

            <!-- Reseñas Section -->
            <div class="hero-buttons">
                <a href="{{ route('resena') }}" class="btn btn-primary">Reseñas</a>
            </div>
        </div>
        @else
        <p>No se encontró el emprendimiento</p>
        @endif
    </main>
</body>
</html>