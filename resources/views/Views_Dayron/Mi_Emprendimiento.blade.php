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
    <!-- Hero Section -->
    <section class="hero">
      <div class="hero-background">
          <img src="{{ asset('images/'.$emprendimiento->background) }}" alt="{{ $emprendimiento->name }}">
      </div>
      <div class="hero-overlay"></div>
      <div class="hero-content">
          <div class="hero-main">
              <img src="{{ asset('images/'.$emprendimiento->logo_path) }}" alt="{{ $emprendimiento->name }} Logo" class="hero-logo">
              <h1>{{ $emprendimiento->name }}</h1>
              <p class="hero-quote">"{{ $emprendimiento->slogan }}"</p>
          </div>
      </div>
    </section>

    <!-- Profile Section -->
    <section class="profile">
        <div class="profile-card">
            <img src="{{ asset('images/perfil.png') }}" alt="Cristian Sebastian Delgado" class="profile-image">
            <div class="profile-info">
                <h2>CRISTIAN SEBASTIAN DELGADO</h2>
                <p><i class="fas fa-envelope"></i> <a href="mailto:cristiansdp@gmail.com">cristiansdp@gmail.com</a></p>
                <p><i class="fas fa-map-marker-alt"></i> 40 - Jersey City, Gal / 86551</p>
                <p><i class="fas fa-phone"></i> 320-898-7646</p>
                <p><i class="fas fa-city"></i> Popayán</p>
            </div>
        </div>
    </section>

    <!-- Buttons -->
    <div class="hero-buttons">
        <a href="{{ route('resena') }}" class="btn btn-primary">Reseñas</a>
        <a href="{{ route('Editar_Emprendimiento_2.index') }}" class="btn btn-secondary">Editar</a>
    </div>

    <!-- Products Section -->
    <div class="content">
        <section class="products">
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

        <!-- Description Section -->
        <section class="description">
            <h3>Descripción</h3>
            <p><strong>{{ $emprendimiento->name }}</strong> es una empresa apasionada por la elaboración de auténticas arepas 100% de maíz, que se dedica a preservar la tradición y el sabor casero de este emblemático alimento.</p>

            <p>Nuestra misión es proporcionar una experiencia gastronómica única, caracterizada por la excelencia de nuestros ingredientes y la dedicación a la preparación. Cada arepa que producimos es el resultado de un meticuloso proceso que garantiza no solo un sabor inigualable, sino también una alta calidad nutricional.</p>

            <p>Cada bocado de nuestras arepas representa el cuidado y la pasión que ponemos en cada etapa de su elaboración, desde la selección del maíz hasta el momento en que llega a tu mesa.</p>
        </section>
    </div>
  </div>
</main>

</body>
</html>
