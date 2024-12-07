@extends('layouts.Nav-Bar_Inversionista')
@extends('layouts.Footer_Inversor')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Reseñas de Emprendimiento</title>
    <link rel="stylesheet" href="{{ asset('css/reseñaInver.css') }}">
</head>
<body>
    <main class="reviews-container">
        <h2 class="reviews-title">Reseñas</h2>

        <div class="reviews-grid">
            @if(!empty($reviews))
                @foreach($reviews as $review)
                    <div class="review-card">
                        <div class="review-header">
                            <div class="company-info">
                                <!-- Imagen de perfil del inversionista -->
                                <img src="{{ $review['investor']['profile_image'] ?? asset('images/placeholder.jpg') }}" 
                                     alt="Foto de perfil" 
                                     class="company-logo">
                                <div class="company-details">
                                    <h3>{{ $review['investor']['name'] ?? 'Inversionista' }}</h3>
                                    <span class="timestamp">
                                        {{ \Carbon\Carbon::parse($review['created_at'])->format('d M Y H:i') }}
                                    </span>
                                </div>
                            </div>
                            <div class="rating-container">
                                <div class="rating">
                                    @for($i = 1; $i <= 5; $i++)
                                        <span class="{{ $i <= $review['qualification'] ? 'star-filled' : 'star-empty' }}">★</span>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <div class="review-content">
                            <p>{{ $review['comment'] }}</p>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="no-reviews">
                    <p>Aún no hay reseñas publicadas. ¡Sé el primero en compartir tu experiencia!</p>
                </div>
            @endif
        </div>

        <div class="new-review-container">
            <div class="new-review-header">
                <!-- Imagen de perfil del usuario autenticado -->
                <img src="{{ optional(auth()->user())->profile_image ?? asset('images/placeholder.jpg') }}" 
                     alt="{{ optional(auth()->user())->name ?? 'Inversionista' }}" 
                     class="new-review-avatar">
                <h3 class="new-review-title">{{ optional(auth()->user())->name ?? 'Inversionista' }}</h3>
            </div>
        
            <form id="review-form" method="POST" action="{{ route('resenaInver.store') }}">
                @csrf
                <div class="star-rating">
                    <input type="radio" id="star5" name="rating" value="5" required>
                    <label for="star5"></label>
                    <input type="radio" id="star4" name="rating" value="4" required>
                    <label for="star4"></label>
                    <input type="radio" id="star3" name="rating" value="3" required>
                    <label for="star3"></label>
                    <input type="radio" id="star2" name="rating" value="2" required>
                    <label for="star2"></label>
                    <input type="radio" id="star1" name="rating" value="1" required>
                    <label for="star1"></label>
                </div>
            
                <textarea 
                    id="review-comment"
                    class="review-textarea" 
                    name="comment" 
                    placeholder="Comparte tu experiencia..." 
                    maxlength="500" 
                    required
                ></textarea>
            
                <input type="hidden" id="entrepreneur-id" name="entrepreneur_id" value="{{ $entrepreneur_id }}">
            
                <button type="submit" class="submit-review-btn">Enviar Reseña</button>
            </form>
            
        </div>
    </main>

    <script>
        document.getElementById('review-form').addEventListener('submit', async function (e) {
            e.preventDefault();
    
            const rating = document.querySelector('input[name="rating"]:checked')?.value;
            const comment = document.getElementById('review-comment').value;
            const entrepreneurId = document.getElementById('entrepreneur-id').value;
    
            if (!rating || !comment) {
                alert('Por favor completa tu calificación y comentario');
                return;
            }
    
            try {
                const response = await fetch('{{ route("resenaInver.store") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        rating: rating,
                        comment: comment,
                        entrepreneur_id: entrepreneurId
                    }),
                });
    
                const data = await response.json();
    
                if (data.success) {
                    alert(data.message);
                    location.reload();  // Recarga la página para ver la nueva reseña
                } else {
                    alert(data.message || 'Error al publicar la reseña');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Error al enviar la reseña. Por favor, intenta nuevamente.');
            }
        });
    </script>
    
</body>
</html>