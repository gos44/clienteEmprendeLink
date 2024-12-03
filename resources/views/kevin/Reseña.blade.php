@extends('layouts.Nav-Bar_Usuario')
@extends('layouts.Footer_Usuario')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Reseñas</title>

    <link rel="stylesheet" href="{{ asset('css/resena.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
  <h2 class="section-title-1">Mis Reseñas</h2>
  <section>
      <div class="latest-posts">
          <!-- Iterar sobre cada reseña -->
          @foreach($reviews as $review)
              <div class="review-post">
                  <div class="review-post-header">
                      <h3>Calificación: {{ $review['qualification'] }}/5</h3>
                  </div>
                  <div class="review-post-content">
                      <p class="review-text">"{{ $review['comment'] }}"</p>
                      <p class="review-author">
                          Por: 
                          @if(isset($review['investor']))
                              {{ $review['investor']['name'] }}
                          @else
                              Anónimo
                          @endif
                      </p>
                      <p class="review-date">
                          Emprendimiento: {{ $review['entrepreneurships_id'] }}
                      </p>
                  </div>
              </div>
          @endforeach
      </div>
  </section>
</body>
</html>