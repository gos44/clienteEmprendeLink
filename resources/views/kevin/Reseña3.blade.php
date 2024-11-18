
@extends('layouts.Nav-Bar_Usuario')
@extends('layouts.Footer_Usuario')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reseñas3</title>
    <link rel="icon" href="img/logoCuadrado.png" type="image/png">

    <link rel="stylesheet" href="{{asset('css/reseña3.css')}}"> 

    
</head>
<body>


  
  


    <div class="review-container">
      <h1 class="review-title">RESEÑAS</h1>
      
      <div class="review-box">
          <!-- Review Header -->
          <div class="review-header">
              <div class="company-info">
                  <img src="https://images.pexels.com/photos/774095/pexels-photo-774095.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="sony" class="company-logo">
                  <div class="review-info">
                      <h2>Alexia</h2>
                      <div class="timestamp">
                          <i class="far fa-clock"></i>
                          <span>4:15 PM</span>
                      </div>
                  </div>
              </div>
              
              <!-- Rating Section -->
              <div class="rating-container">
                <div class="rating">
                    <input value="5" name="rate-sony" id="sony-star5" type="radio">
                    <label title="text" for="sony-star5"></label>
                    <input value="4" name="rate-sony" id="sony-star4" type="radio">
                    <label title="text" for="sony-star4"></label>
                    <input value="3" name="rate-sony" id="sony-star3" type="radio" checked="">
                    <label title="text" for="sony-star3"></label>
                    <input value="2" name="rate-sony" id="sony-star2" type="radio">
                    <label title="text" for="sony-star2"></label>
                    <input value="1" name="rate-sony" id="sony-star1" type="radio">
                    <label title="text" for="sony-star1"></label>
                </div>
            </div>
          </div>
  
          <!-- Review Content -->
          <div class="review-content">
              <div class="review-subject">
                  <strong>Asunto:</strong> Invitación a una Colaboración Innovadora entre Sony y [Nombre de tu Empresa]
              </div>
              <div class="review-body">
                  <p>Estimado/a [Nombre del destinatario],</p>
                  <p>Espero que este mensaje lo/a encuentre bien. Me dirijo a usted en nombre de Sony Corporation con respecto a su notable empresa, [Nombre de tu Empresa].</p>
                  <!-- ... resto del contenido ... -->
              </div>
          </div>
  
          <!-- Reply Section -->
          <div class="reply-section">
              <div class="reply-container">
                  <img src="link/12.png" alt="Usuario" class="user-avatar">
                  <div class="reply-input-container">
                      <div class="reply-input" contenteditable="true" placeholder="Escribe tu respuesta aquí..."></div>
                      <div class="reply-actions">
                          <a href="resenas4.html"><button class="reply-button">
                              <i class="fas fa-paper-plane"></i>
                              <span>Enviar respuesta</span>
                          </button></a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
   

  
</body>
</html>