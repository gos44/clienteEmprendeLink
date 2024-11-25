
@extends('layouts.Nav-Bar_Usuario')
@extends('layouts.Footer_Usuario')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reseñas4</title>

    <link rel="stylesheet" href="{{asset('css/reseña4.css')}}"> 

    
</head>
<body>

  
 


    <div class="review-container">
      <h1 class="review-title">RESEÑAS</h1>
      <div class="review-box">
          <div class="review-header">
              <div class="company-info">
                  <img src="https://images.pexels.com/photos/774095/pexels-photo-774095.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="sony" class="company-logo">
                  <div class="review-info">
                      <h2>Alexia</h2>
                      <div class="review-meta">
                          <span class="review-date">4:15 PM</span>
                         <!-- Rating Section -->
              <!-- <div class="rating-container">
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
            </div> -->
                      </div>
                  </div>
              </div>
          </div>
  
          <div class="review-content">
              <div class="review-subject">
                  <h3>Asunto: Invitación a una Colaboración Innovadora entre Sony y [Nombre de tu Empresa]</h3>
              </div>
              <div class="review-body">
                  <p class="greeting">Estimado/a [Nombre del destinatario],</p>
                  <div class="message-content">
                      <p>Espero que este mensaje lo/a encuentre bien. Me dirijo a usted en nombre de Sony Corporation con respecto a su notable empresa, [Nombre de tu Empresa].</p>
                      <p>Queríamos expresar nuestra admiración por la manera en que han abordado [descripción breve del enfoque o producto de tu empresa], demostrando un enfoque innovador y un profundo entendimiento de las necesidades del mercado. Esta dedicación a la excelencia y la creatividad resuena profundamente con los valores fundamentales de Sony.</p>
                      <p>En este sentido, estamos entusiasmados con la idea de explorar posibles sinergias y oportunidades de colaboración entre nuestras dos empresas. Creemos que combinando la experiencia y los recursos de Sony en tecnología y entretenimiento con la visión emprendedora y la agilidad de [Nombre de tu Empresa], podríamos crear algo realmente excepcional.</p>
                  </div>
                  <div class="message-footer">
                      <p>Atentamente,</p>
                      <p class="signature">[Tu Nombre]<br>[Tu Cargo]<br>Sony Corporation</p>
                  </div>
              </div>
          </div>
  
          <div class="comment-section">
              <div class="comment-box">
                  <img src="link/12.png" alt="Usuario" class="user-avatar">
                  <div class="comment-content">
                      <div class="comment-header">
                          <span class="commenter-name">Cristian Sebastian</span>
                          <span class="comment-time">Hace 2 horas</span>
                      </div>
                      <div class="comment-text">
                          En general, "Interesante, pero me gustaría ver más evidencia que respalde 
                          esa perspectiva" es una forma útil y versátil de responder a las opiniones 
                          sin expresar una opinión definitiva...
                      </div>
                      
                  </div>
                  
              </div>
              
          </div>
      </div>
      <div class="exit-button-container">
        <a href="{{asset('resena')}}"><button class="exit-button">Cerrar</button></a>
    </div>
  </div>
     
   
 
</body>
</html>