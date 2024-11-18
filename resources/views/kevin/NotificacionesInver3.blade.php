
@extends('layouts.Nav-Bar_Inversionista')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inver3</title>
    <link rel="icon" href="img/logoCuadrado.png" type="image/png">

    <link rel="stylesheet" href="{{asset('css/notificacionesInver3.css')}}"> 

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
                    <h2>¡LEGO tiene novedades para ti!</h2>
                    <p>¡Atención a todos los fanáticos de LEGO! ¿Preparados para nuevas aventuras creativas? LEGO tiene emocionantes noticias que compartir:</p>
                    <h3>Nuevos sets:</h3>
                    <ul>
                        <li><strong>[Nombre del set 1]</strong>: Descripción breve del set.</li>
                        <li><strong>[Nombre del set 2]</strong>: Descripción breve del set.</li>
                        <li><strong>[Nombre del set 3]</strong>: Descripción breve del set.</li>
                    </ul>
                    <h3>Ofertas especiales:</h3>
                    <ul>
                        <li><strong>[Descripción de la oferta 1]</strong>: Detalles de la oferta.</li>
                        <li><strong>[Descripción de la oferta 2]</strong>: Detalles de la oferta.</li>
                        <li><strong>[Descripción de la oferta 3]</strong>: Detalles de la oferta.</li>
                    </ul>
                    <h3>Eventos y actividades:</h3>
                    <ul>
                        <li><strong>[Descripción del evento 1]</strong>: Fecha, hora, lugar y detalles del evento.</li>
                        <li><strong>[Descripción del evento 2]</strong>: Fecha, hora, lugar y detalles del evento.</li>
                        <li><strong>[Descripción del evento 3]</strong>: Fecha, hora, lugar y detalles del evento.</li>
                    </ul>
                    <p>No te pierdas estas increíbles novedades. Visita nuestra tienda o sitio web para más información.</p>
                    <p>¡Te esperamos en el mundo de LEGO! #LEGO #JugarEsAprender #NuevasAventuras</p>
                    <p>P.D: No olvides seguirnos en nuestras redes sociales para estar al día con las últimas noticias y sorpresas.</p>
                    <p>[Enlace a redes sociales 1] [Enlace a redes sociales 2] [Enlace a redes sociales 3]</p>
                </div>
                <div class="message-actions">
                  <button type="button" class="delete-btn" onclick="showNotification()">Eliminar</button>
                  <a href="inverNoti2.html"><button type="button" class="reply-btn">Responder</button></a>
              </div>
          </div>
      
          <!-- Notificación oculta por defecto -->
          <div class="notification" id="notification" style="display: none;">
              <p><h2>¡Notificación eliminada exitosamente!</h2></p>
              <button onclick="hideNotification()">Cerrar</button>
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