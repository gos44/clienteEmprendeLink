@extends('layouts.Nav-Bar_Inversionista')
@extends('layouts.Footer_Inversor')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Reseñas Globales</title>
    <link rel="stylesheet" href="{{ asset('css/reseñaInver.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="reviews-container">
        <h2 class="reviews-title">Reseñas Globales</h2>

        @if ($errors->any())
            <div class="error-messages">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="error-message">
                {{ session('error') }}
            </div>
        @endif

        <div class="reviews-grid">
            @if (!empty($reviews))
                @foreach ($reviews as $review)
                <div class="review-card">
                    <div class="review-header">
                        <div class="company-info">
                            <img src="{{ $review['investor']['image'] ?? 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png' }}" 
                                 alt="Foto de perfil" class="company-logo">
                            <div class="company-details">
                                <h3>{{ $review['investor']['name'] ?? 'Inversionista' }}</h3>
                                <span class="timestamp">
                                    {{ \Carbon\Carbon::parse($review['created_at'] ?? now())->format('d M Y H:i') }}
                                </span>
                            </div>
                        </div>
                        <div class="rating-container">
                            <div class="rating">
                                @for ($i = 1; $i <= 5; $i++)
                                    <span class="{{ $i <= ($review['qualification'] ?? 0) ? 'star-filled' : 'star-empty' }}">★</span>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <div class="review-content">
                        <p>{{ $review['comment'] ?? 'Sin comentario disponible.' }}</p>
                    </div>
                    <div class="review-entrepreneurship">
                        @if(!empty($review['entrepreneur']))
                            <p>Emprendedor: {{ $review['entrepreneur']['name'] ?? 'No disponible' }}</p>
                        @endif
                        
                        @if(!empty($review['entrepreneurship']))
                            <p>Emprendimiento: {{ $review['entrepreneurship']['name'] ?? 'No disponible' }}</p>
                        @endif
                        
                        @if(empty($review['entrepreneur']) && empty($review['entrepreneurship']))
                            <p>Reseña global sin emprendimiento específico</p>
                        @endif
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
                <img src="{{ $user['image'] ?? 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png' }}" 
                     alt="{{ $user['name'] ?? 'Inversionista' }}" class="new-review-avatar">
                <h3 class="new-review-title">{{ $user['name'] ?? 'Inversionista' }}</h3>
            </div>

            <form id="review-form" method="POST" action="{{ route('resenaInver.store') }}">
                @csrf
                <div class="star-rating">
                    <input type="radio" id="star5" name="qualification" value="5" required>
                    <label for="star5">★</label>
                    <input type="radio" id="star4" name="qualification" value="4" required>
                    <label for="star4">★</label>
                    <input type="radio" id="star3" name="qualification" value="3" required>
                    <label for="star3">★</label>
                    <input type="radio" id="star2" name="qualification" value="2" required>
                    <label for="star2">★</label>
                    <input type="radio" id="star1" name="qualification" value="1" required>
                    <label for="star1">★</label>
                </div>
            
                <textarea id="review-comment" class="review-textarea" name="comment" 
                          placeholder="Comparte tu experiencia global o selecciona un emprendimiento..." 
                          maxlength="500" required></textarea>
                
                <div class="entrepreneurship-select-container">
                    <label for="entrepreneur_id">Emprendimiento (opcional):</label>
                    <select id="entrepreneur_id" name="entrepreneur_id" class="entrepreneurship-select">
                        <option value="">Seleccionar Emprendimiento</option>
                        @if(!empty($entrepreneurs))
                            @foreach($entrepreneurs as $entrepreneur)
                                <option value="{{ $entrepreneur['id'] }}">
                                    {{ $entrepreneur['name'] ?? 'Sin nombre' }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <button type="submit" class="submit-review-btn">Enviar Reseña</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('review-form').addEventListener('submit', async function (e) {
            e.preventDefault();

            const rating = document.querySelector('input[name="qualification"]:checked')?.value;
            const comment = document.getElementById('review-comment').value.trim();
            const entrepreneurId = document.getElementById('entrepreneur_id').value;

            if (!rating || !comment) {
                alert('Por favor, completa todos los campos requeridos.');
                return;
            }

            try {
                const requestData = {
                    qualification: rating,
                    comment: comment
                };

                // Only add entrepreneur_id if it's not empty
                if (entrepreneurId) {
                    requestData.entrepreneur_id = entrepreneurId;
                }

                const response = await fetch('{{ route("resenaInver.store") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(requestData),
                    credentials: 'same-origin'
                });

                if (response.ok) {
                    alert('Reseña enviada con éxito');
                    location.reload();
                } else {
                    const errorData = await response.json();
                    console.error('Detalles del error:', errorData);
                    alert(errorData.message || 'Error al publicar la reseña.');
                }
            } catch (error) {
                console.error('Error de conexión:', error);
                alert('No se pudo conectar con el servidor. Por favor, inténtalo más tarde.');
            }
        });
    </script>
</body>
</html>