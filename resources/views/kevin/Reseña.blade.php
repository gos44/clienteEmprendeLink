
@extends('layouts.Nav-Bar_Usuario')
@extends('layouts.Footer_Usuario')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReseñasUsu</title>

    <link rel="stylesheet" href="{{asset('css/resena.css')}}"> 
</head>
<body>
      
 

 

    

<main class="reviews-container">
  <h2 class="reviews-title">RESEÑAS</h2>
  <div class="reviews-grid">
      <!-- Primera Reseña -->
      <div class="review-card">
          <div class="review-header">
              <div class="company-info">
                  <a href="reseñas2.html">
                      <img src="https://images.pexels.com/photos/774095/pexels-photo-774095.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Sony" class="company-logo">
                  </a>
                  <div class="company-details">
                      <h3>Alexia cristina</h3>
                      <span class="timestamp">4:15 PM</span>
                  </div>
              </div>
              <div class="rating-container">
                  <div class="rating">
                      <input value="5" name="rate-sony" id="sony-star5" type="radio" checked="">
                      <label title="text" for="sony-star5"></label>
                      <input value="4" name="rate-sony" id="sony-star4" type="radio">
                      <label title="text" for="sony-star4"></label>
                      <input value="3" name="rate-sony" id="sony-star3" type="radio">
                      <label title="text" for="sony-star3"></label>
                      <input value="2" name="rate-sony" id="sony-star2" type="radio">
                      <label title="text" for="sony-star2"></label>
                      <input value="1" name="rate-sony" id="sony-star1" type="radio">
                      <label title="text" for="sony-star1"></label>
                  </div>
              </div>
          </div>
          <div class="review-content">
              <p>Mi experiencia emprendiendo en el campo de la tecnología ha sido extraordinaria. El apoyo recibido en desarrollo de software y la mentoría especializada me permitieron llevar mi startup de una idea a un producto viable en menos de un año. Las herramientas y conexiones proporcionadas fueron fundamentales para nuestro éxito inicial.</p>
          </div>
      </div>

      <!-- Segunda Reseña -->
      <div class="review-card">
          <div class="review-header">
              <div class="company-info">
                  <a href="reseñas2.html">
                      <img src="https://images.pexels.com/photos/1222271/pexels-photo-1222271.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Sony" class="company-logo">
                  </a>
                  <div class="company-details">
                      <h3>Jhorman Blessed</h3>
                      <span class="timestamp">3:45 PM</span>
                  </div>
              </div>
              <div class="rating-container">
                  <div class="rating">
                      <input value="5" name="rate-sony2" id="sony2-star5" type="radio">
                      <label title="text" for="sony2-star5"></label>
                      <input value="4" name="rate-sony2" id="sony2-star4" type="radio" checked="">
                      <label title="text" for="sony2-star4"></label>
                      <input value="3" name="rate-sony2" id="sony2-star3" type="radio">
                      <label title="text" for="sony2-star3"></label>
                      <input value="2" name="rate-sony2" id="sony2-star2" type="radio">
                      <label title="text" for="sony2-star2"></label>
                      <input value="1" name="rate-sony2" id="sony2-star1" type="radio">
                      <label title="text" for="sony2-star1"></label>
                  </div>
              </div>
          </div>
          <div class="review-content">
              <p>Como emprendedor en el sector de comercio electrónico, encontré exactamente lo que necesitaba para hacer crecer mi negocio. Los talleres de marketing digital y las sesiones de networking me ayudaron a expandir mi mercado. Aunque el camino no fue fácil, el soporte constante marcó la diferencia en momentos críticos.</p>
          </div>
      </div>

      <!-- Tercera Reseña -->
      <div class="review-card">
          <div class="review-header">
              <div class="company-info">
                  <a href="reseñas2.html">
                      <img src="https://images.pexels.com/photos/733872/pexels-photo-733872.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Sony" class="company-logo">
                  </a>
                  <div class="company-details">
                      <h3>Angela Bonilla</h3>
                      <span class="timestamp">2:30 PM</span>
                  </div>
              </div>
              <div class="rating-container">
                  <div class="rating">
                      <input value="5" name="rate-sony3" id="sony3-star5" type="radio" checked="">
                      <label title="text" for="sony3-star5"></label>
                      <input value="4" name="rate-sony3" id="sony3-star4" type="radio">
                      <label title="text" for="sony3-star4"></label>
                      <input value="3" name="rate-sony3" id="sony3-star3" type="radio">
                      <label title="text" for="sony3-star3"></label>
                      <input value="2" name="rate-sony3" id="sony3-star2" type="radio">
                      <label title="text" for="sony3-star2"></label>
                      <input value="1" name="rate-sony3" id="sony3-star1" type="radio">
                      <label title="text" for="sony3-star1"></label>
                  </div>
              </div>
          </div>
          <div class="review-content">
              <p>Increíble la transformación que experimenté en mi proyecto de consultoría. La metodología ágil que aprendí y los recursos de gestión empresarial me permitieron optimizar procesos y multiplicar mis clientes. El enfoque práctico y las estrategias de escalamiento fueron clave para mi crecimiento.</p>
          </div>
      </div>

      <!-- Cuarta Reseña -->
      <div class="review-card">
          <div class="review-header">
              <div class="company-info">
                  <a href="reseñas2.html">
                      <img src="https://images.pexels.com/photos/91227/pexels-photo-91227.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Sony" class="company-logo">
                  </a>
                  <div class="company-details">
                      <h3>Esteban Arias TC</h3>
                      <span class="timestamp">1:20 PM</span>
                  </div>
              </div>
              <div class="rating-container">
                  <div class="rating">
                      <input value="5" name="rate-sony4" id="sony4-star5" type="radio">
                      <label title="text" for="sony4-star5"></label>
                      <input value="4" name="rate-sony4" id="sony4-star4" type="radio" checked="">
                      <label title="text" for="sony4-star4"></label>
                      <input value="3" name="rate-sony4" id="sony4-star3" type="radio">
                      <label title="text" for="sony4-star3"></label>
                      <input value="2" name="rate-sony4" id="sony4-star2" type="radio">
                      <label title="text" for="sony4-star2"></label>
                      <input value="1" name="rate-sony4" id="sony4-star1" type="radio">
                      <label title="text" for="sony4-star1"></label>
                  </div>
              </div>
          </div>
          <div class="review-content">
              <p>La aceleradora fue fundamental para mi startup de servicios financieros. El acceso a inversores y las sesiones de pitch practice elevaron nuestro proyecto a otro nivel. La red de contactos que construí y el feedback recibido de expertos del sector fueron invaluables para refinar nuestro modelo de negocio.</p>
          </div>
      </div>

      <!-- Quinta Reseña -->
      <div class="review-card">
          <div class="review-header">
              <div class="company-info">
                  <a href="reseñas2.html">
                      <img src="https://images.pexels.com/photos/712513/pexels-photo-712513.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Sony" class="company-logo">
                  </a>
                  <div class="company-details">
                      <h3>Juliana QM</h3>
                      <span class="timestamp">11:45 AM</span>
                  </div>
              </div>
              <div class="rating-container">
                  <div class="rating">
                      <input value="5" name="rate-sony5" id="sony5-star5" type="radio" checked="">
                      <label title="text" for="sony5-star5"></label>
                      <input value="4" name="rate-sony5" id="sony5-star4" type="radio">
                      <label title="text" for="sony5-star4"></label>
                      <input value="3" name="rate-sony5" id="sony5-star3" type="radio">
                      <label title="text" for="sony5-star3"></label>
                      <input value="2" name="rate-sony5" id="sony5-star2" type="radio">
                      <label title="text" for="sony5-star2"></label>
                      <input value="1" name="rate-sony5" id="sony5-star1" type="radio">
                      <label title="text" for="sony5-star1"></label>
                  </div>
              </div>
          </div>
          <div class="review-content">
              <p>Como emprendedora en el sector salud, encontré el ecosistema perfecto para desarrollar mi innovación. Las mentorías especializadas y el acceso a laboratorios de prototipado aceleraron significativamente nuestro desarrollo. El apoyo en propiedad intelectual fue especialmente valioso para proteger nuestra tecnología.</p>
          </div>
      </div>

      <!-- Sexta Reseña -->
      <div class="review-card">
          <div class="review-header">
              <div class="company-info">
                  <a href="reseñas2.html">
                      <img src="https://images.pexels.com/photos/1758144/pexels-photo-1758144.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Sony" class="company-logo">
                  </a>
                  <div class="company-details">
                      <h3>Ana Maria</h3>
                      <span class="timestamp">10:30 AM</span>
                  </div>
              </div>
              <div class="rating-container">
                  <div class="rating">
                      <input value="5" name="rate-sony6" id="sony6-star5" type="radio" checked="">
                      <label title="text" for="sony6-star5"></label>
                      <input value="4" name="rate-sony6" id="sony6-star4" type="radio">
                      <label title="text" for="sony6-star4"></label>
                      <input value="3" name="rate-sony6" id="sony6-star3" type="radio">
                      <label title="text" for="sony6-star3"></label>
                      <input value="2" name="rate-sony6" id="sony6-star2" type="radio">
                      <label title="text" for="sony6-star2"></label>
                      <input value="1" name="rate-sony6" id="sony6-star1" type="radio">
                      <label title="text" for="sony6-star1"></label>
                  </div>
              </div>
          </div>
          <div class="review-content">
              <p>La experiencia transformó mi proyecto de sostenibilidad ambiental. Los programas de capacitación en modelos de negocio circulares y el acceso a una comunidad de emprendedores afines fueron cruciales. Las herramientas de medición de impacto nos ayudaron a demostrar el valor de nuestra propuesta a los inversores.</p>
          </div>
      </div>
  </div>
</main>

 

</body>
</html>