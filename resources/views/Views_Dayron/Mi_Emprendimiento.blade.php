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
<main>
  <div class="main-content">
    <!-- Hero Section -->
    <section class="hero">
      <div class="hero-background">
          <img src="{{ asset('storage/' . $emprendimiento->background_image) }}" alt="{{ $emprendimiento->name }}">
      </div>
      <div class="hero-overlay"></div>
      <div class="hero-content">
          <div class="hero-main">
              <img src="{{ asset('storage/' . $emprendimiento->logo) }}" alt="{{ $emprendimiento->name }} Logo" class="hero-logo">
              <h1>{{ $emprendimiento->name }}</h1>
              <p class="hero-quote">"{{ $emprendimiento->slogan }}"</p>
          </div>
      </div>
    </section>

    <!-- Profile Section -->
    <section class="profile">
        <div class="profile-card">
            <img src="{{ asset('storage/' . $usuario->profile_picture) }}" alt="{{ $usuario->name }}" class="profile-image">
            <div class="profile-info">
                <h2>{{ strtoupper($usuario->name) }}</h2>
                <p><i class="fas fa-envelope"></i> <a href="mailto:{{ $usuario->email }}">{{ $usuario->email }}</a></p>
                <p><i class="fas fa-map-marker-alt"></i> {{ $usuario->address }}</p>
                <p><i class="fas fa-phone"></i> {{ $usuario->phone }}</p>
                <p><i class="fas fa-city"></i> {{ $usuario->city }}</p>
            </div>
        </div>
    </section>

    <!-- Buttons -->
    <div class="hero-buttons">
        <a href="{{ route('resena', ['id' => $emprendimiento->id]) }}" class="btn btn-primary">Reseñas</a>
        <a href="{{ route('Editar_Emprendimiento_2.index', ['id' => $emprendimiento->id]) }}" class="btn btn-secondary">Editar</a>
    </div>

    <!-- Products Section -->
    <div class="content">
        <section class="products">
            @foreach($productos as $producto)
            <div class="product">
                <img src="{{ asset('storage/' . $producto->image) }}" alt="{{ $producto->name }}">
                <div class="product-info">
                    <h4>{{ $producto->name }}</h4>
                    <p>{{ $producto->description }}</p>
                </div>
            </div>
            @endforeach
        </section>

        <!-- Description Section -->
        <section class="description">
            <h3>Descripción</h3>
            <p>{{ $emprendimiento->description }}</p>
        </section>
    </div>
  </div>
</main>
</body>
</html>
