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
    <section class="reviews-container">
        <h2 class="reviews-title">Reseñas</h2>
        <div class="reviews-list">
            @foreach($reviews as $review)
                <div class="review-card">
                    <div class="review-header">
                        <div class="star-rating">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $review['qualification'])
                                    <i class="fas fa-star filled"></i>
                                @else
                                    <i class="far fa-star"></i>
                                @endif
                            @endfor
                        </div>
                    </div>
                    <div class="review-content">
                        <p class="review-text">"{{ $review['comment'] }}"</p>
                        <div class="review-meta">
                            <p class="review-author">
                                Por: 
                                @if(isset($review['investor']))
                                    {{ $review['investor']['name'] }}
                                @else
                                    Anónimo
                                @endif
                            </p>
                            <p class="review-entrepreneurship">
                                Emprendimiento: {{ $review['entrepreneurships_id'] }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</body>
</html>