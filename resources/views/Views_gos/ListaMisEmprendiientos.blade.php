@extends('layouts.Nav-Bar_Usuario')

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
            @if(count($connections) > 0)
                @foreach($connections as $connection)
                <div class="wine-post">
                    <div class="wine-post-header">
                        <img src="{{ $connection['background'] ?? 'URL_POR_DEFECTO' }}" 
                             alt="Fondo del emprendimiento" 
                             class="background-img">
                        <img src="{{ $connection['logo_path'] ?? 'URL_POR_DEFECTO' }}" 
                             alt="{{ $connection['name'] ?? 'Emprendimiento' }}" 
                             class="logo-img">
                    </div>
                    <div class="wine-post-content">
                        <h3>{{ $connection['name'] ?? 'Sin nombre' }}</h3>
                        <p class="quote">{{ $connection['slogan'] ?? 'Sin eslogan' }}</p>
                        <p class="description">
                            {{ Str::limit($connection['general_description'] ?? 'Sin descripción', 100) }}
                        </p>
                        <a href="{{ route('myentrepreneurships.show', ['id' => $connection['id'] ?? 0]) }}" 
                           class="butn">Más Información...</a>
                    </div>
                </div>
                @endforeach
            @else
                <p>No tienes emprendimientos publicados aún.</p>
            @endif
        </div>
    </section>

    @extends('layouts.Footer_Usuario')
</body>
</html>
