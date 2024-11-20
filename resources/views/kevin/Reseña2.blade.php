
@extends('layouts.Nav-Bar_Usuario')
@extends('layouts.Footer_Usuario')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reseñas2</title>

    <link rel="stylesheet" href="{{asset('css/reseña2.css')}}"> 
    
</head>
<body>
  
 
         
    


    <div class="reviews-wrapper">
      <div class="review-container">
          <h1 class="reviews-title">Reseñas</h1>
          
          <div class="review-card">
              <div class="review-header">
                  <div class="company-info">
                      <img src="https://images.pexels.com/photos/774095/pexels-photo-774095.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="sony" class="company-logo">
                      <div class="header-text">
                          <h2>Alexia</h2>
                          <div class="review-metadata">
                              <span class="timestamp">4:15 PM</span>
                              <div class="rating-container">
                                <!-- <div class="rating">
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
                                </div> -->
                            </div>
                          </div>
                      </div>
                  </div>
                  <div class="review-status">
                      <span class="status-badge">Pendiente</span>
                  </div>
              </div>
  
              <div class="review-content">
                  <div class="subject">
                      <h3>Asunto: Invitación a una Colaboración Innovadora entre Sony y [Nombre de tu Empresa]</h3>
                  </div>
                  
                  <div class="message-content">
                      <p>Estimado/a [Nombre del destinatario],</p>
                      <p>Espero que este mensaje lo/a encuentre bien. Me dirijo a usted en nombre de Sony Corporation con respecto a su notable empresa, [Nombre de tu Empresa].</p>
                      <p>Queríamos expresar nuestra admiración por la manera en que han abordado [descripción breve del enfoque o producto de tu empresa], demostrando un enfoque innovador y un profundo entendimiento de las necesidades del mercado. Esta dedicación a la excelencia y la creatividad resuena profundamente con los valores fundamentales de Sony.</p>
                      <p>En este sentido, estamos entusiasmados con la idea de explorar posibles sinergias y oportunidades de colaboración entre nuestras dos empresas. Creemos que combinando la experiencia y los recursos de Sony en tecnología y entretenimiento con la visión emprendedora y la agilidad de [Nombre de tu Empresa], podríamos crear algo realmente excepcional.</p>
                      <p>Nos gustaría proponer una reunión para discutir en detalle cómo podríamos colaborar y explorar juntos nuevas oportunidades. Por favor, indíquenos su disponibilidad para coordinar una fecha y hora conveniente para ambos.</p>
                      <p>Agradecemos de antemano su tiempo y consideración. Esperamos con interés su respuesta y la posibilidad de trabajar juntos en esta emocionante iniciativa.</p>
                  </div>
  
                  <div class="signature">
                      <p>Atentamente,</p>
                      <p class="sender-info">
                          [Tu Nombre]<br>
                          [Tu Cargo]<br>
                          Sony Corporation
                      </p>
                  </div>
              </div>
  
              <div class="review-actions">
                  <a href="{{asset('resena3')}}" class="action-button reply">
                      <!-- <span class="button-icon">↪</span> -->
                      Responder
                  </a>
              </div>
          </div>
      </div>
  </div>

    
  
 
</body>
</html>