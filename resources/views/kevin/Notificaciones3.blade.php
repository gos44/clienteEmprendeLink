
@extends('layouts.Nav-Bar_Usuario')
@extends('layouts.Footer_Usuario')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>notif3</title>

    <link rel="stylesheet" href="{{asset('css/notificaciones3.css')}}"> 
    <!-- Asegúrate de cargar Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    

        <main>
            <div class="message">
                <div class="message-header">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/24/LEGO_logo.svg/270px-LEGO_logo.svg.png" alt="LEGO Logo" class="sender-logo">
                    <div class="sender-info">
                        <strong>LEGO</strong>
                        <span>3:15 PM</span>
                    </div>
                </div>
                <div class="message-content">
                  <h2>¡LEGO tiene grandes novedades para impulsar tu emprendimiento!</h2>
                  <p>Estimado emprendedor, en LEGO creemos en el poder de las ideas y el emprendimiento. Estamos emocionados de compartir contigo nuevas oportunidades para fortalecer tu negocio y fomentar la creatividad en tu comunidad:</p>
                  
                  <h3>Nuevos sets que pueden hacer crecer tu negocio:</h3>
                  <ul>
                      <li><strong>LEGO Creator 3 en 1: Aventuras en el Espacio</strong>: Un set versátil que permite múltiples construcciones, ideal para actividades creativas y talleres en tu negocio.</li>
                      <li><strong>LEGO Education SPIKE™ Prime</strong>: Una herramienta educativa que puede ser clave para los programas de enseñanza STEM en tu emprendimiento, atrayendo a escuelas y estudiantes interesados en tecnología.</li>
                      <li><strong>LEGO City: Centro Urbano</strong>: Un set que fomenta la imaginación y puede ser un gran complemento para tus actividades de construcción en grupo o eventos familiares.</li>
                  </ul>
                  
                  <h3>Ofertas especiales diseñadas para emprendedores:</h3>
                  <ul>
                      <li><strong>Descuento por volumen en sets educativos</strong>: Obtén hasta un 15% de descuento en compras al por mayor de sets LEGO Education para fomentar el aprendizaje práctico en tu comunidad.</li>
                      <li><strong>Programa de afiliados LEGO para emprendedores</strong>: Únete a nuestro programa de afiliados y gana comisiones por recomendar y vender nuestros productos a través de tus canales.</li>
                      <li><strong>Acceso anticipado a nuevos lanzamientos</strong>: Como parte de nuestra colaboración, tendrás acceso exclusivo a lanzamientos de productos antes de que lleguen al mercado general, lo que te permitirá planificar actividades y promociones con anticipación.</li>
                  </ul>
                  
                  <h3>Eventos y actividades para hacer crecer tu red:</h3>
                  <ul>
                      <li><strong>Capacitación virtual para emprendedores</strong>: 12 de octubre, 3:00 PM (hora local). Únete a nuestro seminario en línea donde compartiremos estrategias de negocio y marketing utilizando productos LEGO.</li>
                      <li><strong>Conferencia sobre innovación y emprendimiento</strong>: 20 de octubre, 10:00 AM, en la sede central de LEGO en Billund, Dinamarca. Conoce las últimas tendencias y casos de éxito de emprendedores que han trabajado con LEGO.</li>
                      <li><strong>Encuentro de networking LEGO para emprendedores</strong>: 25 de octubre, 5:00 PM, Ciudad de México. Un evento exclusivo para hacer conexiones con otros emprendedores apoyados por LEGO.</li>
                  </ul>
                  
                  <p>Estas son solo algunas de las formas en las que LEGO está comprometido con el crecimiento de tu negocio. Nuestro objetivo es ayudarte a desarrollar nuevas oportunidades y maximizar el impacto de tu emprendimiento. ¡No pierdas esta oportunidad de crecer con nosotros!</p>
                  
                  <p>¡Estamos emocionados de construir el futuro contigo! #LEGO #Innovación #Emprendimiento #CrecimientoSostenible</p>
                  
                  
                
                  
                  <div class="message-actions">
                    <button type="button" class="delete-btn" onclick="showNotification()">Eliminar</button>
                    <a href="{{asset('notificaciones2')}}"><button type="button" class="reply-btn">Responder</button></a>
                </div>
            </div>
        
            <!-- Notificación oculta por defecto -->
            <div class="notification" id="notification" style="display: none;">
                <p><h2>¡Notificación eliminada exitosamente!</h2></p>
                <a href="{{asset('notificaciones')}}"><button onclick="hideNotification()">Cerrar</button></a>
            </div>
        </main>

    
    <script>
        function showNotification() {
        document.getElementById("notification").style.display = "block";
    }

    // Ocultar la notificación
    function hideNotification() {
        document.getElementById("notification").style.display = "none";
    }
    </script>



</body>
</html>