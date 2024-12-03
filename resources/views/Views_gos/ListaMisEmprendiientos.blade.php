@extends('layouts.Nav-Bar_Usuario')
@extends('layouts.Footer_Usuario')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Emprendimientos</title>

    <link rel="stylesheet" href="{{ asset('css/ListaMisEmprendimientos.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
  <h2 class="section-title-1">Mis Emprendimientos Publicados</h2>
  <section>
      <div class="latest-posts">
          <!-- Iterar sobre cada emprendimiento -->
          @foreach($connections as $connection)
              <div class="wine-post">
                  <div class="wine-post-header">
                      <img src="{{ $connection['background'] }}" alt="Fondo del emprendimiento" class="background-img">
                      <img src="{{ $connection['logo_path'] }}" alt="{{ $connection['name'] }}" class="logo-img">
                  </div>
                  <div class="wine-post-content">
                      <h3>{{ $connection['name'] }}</h3>
                      <p class="quote">{{ $connection['slogan'] }}</p>
                      <p class="description">{{ $connection['general_description'] }}</p>
                      <a href="{{ route('myentrepreneurships.show', ['id' => $connection['id']]) }}" class="butn">Mas Información...</a>
                  </div>
              </div>
          @endforeach
      </div>
  </section>
</body>
</html>
