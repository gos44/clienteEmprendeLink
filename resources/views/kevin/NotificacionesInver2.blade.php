
@extends('layouts.Nav-Bar_Inversionista')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inver2</title>

    <link rel="stylesheet" href="{{asset('css/notificacionesInver2.css')}}"> 

   
</head>
<body>
  
 
    <main>
        <section class="message">
            <div class="message-header">
                <h2>¡Mensaje!</h2>
                <div class="message-controls">
                    <span class="minimize">_</span>
                    <span class="maximize">□</span>
                    <span class="close">x</span>
                </div>
            </div>
            <form>
                <div class="form-group">
                    <label for="destinatario">Destinatario</label>
                    <input type="email" id="destinatario" value="LegoLatam@gmail.com" readonly>
                </div>
                <div class="form-group">
                    <label for="asunto">Asunto</label>
                    <input type="text" id="asunto" value="Solicitud de revisión de emprendimiento" readonly>
                </div>
                <textarea readonly>
Fecha: 2024-04-07
Lugar: Popayán, Cauca, Colombia

Estimada/o [Nombre del representante de la empresa]:
Me pongo en contacto con usted en nombre de [Nombre de su emprendimiento], un emprendimiento innovador que busca [Describa brevemente el objetivo de su emprendimiento].

Con gran entusiasmo, le presentamos nuestro proyecto y solicitamos su valiosa atención para una revisión del mismo. Creemos que [Nombre de su emprendimiento] podría ser de gran interés para [Nombre de la empresa] debido a las siguientes razones:
1. Propuesta de valor única: [Describa en qué se diferencia su emprendimiento de la competencia y por qué es valioso para los clientes/usuarios].
2. Potencial de crecimiento: [Explique el potencial de crecimiento de su emprendimiento en términos de mercado, clientes e ingresos].
3. Alineación con [Nombre de la empresa]: [Explique cómo su emprendimiento se alinea con los valores, objetivos o necesidades de la empresa].
4. Equipo apasionado y experimentado: [Describa brevemente el equipo detrás de su emprendimiento y sus capacidades].


Para facilitar su revisión, hemos adjuntado un resumen ejecutivo que describe en detalle nuestro emprendimiento, incluyendo:
• Problema que resuelve
• Solución propuesta
• Modelo de negocio
• Equipo
• Tracción y logros
• Planificación futura

Agradecemos de antemano su tiempo y consideración. Estamos disponibles para responder cualquier pregunta que pueda tener sobre nuestro emprendimiento y para discutir las posibilidades de colaboración.

Para concretar una breve llamada o reunión, puede contactarnos por correo electrónico a [Su dirección de correo electrónico] o por teléfono al [Su número de teléfono].


Atentamente,
[Su nombre]
[Su cargo en el emprendimiento]
[Nombre de su emprendimiento]
[Sitio web de su emprendimiento]
[Redes sociales de su emprendimiento]
                </textarea>
                
            </form>

            <div class="message-actions">
                <button type="button" class="delete-btn" onclick="showNotification()">Enviar</button>
                <button type="button" class="reply-btn">Adjuntar</button>
            </div>
        </div>
        <div class="notification" id="notification" style="display: none;">
            <p><h2>¡Su respuesta ha sido enviada Exitosamente!</h2></p>
            <button onclick="hideNotification()">Cerrar</button>
        </div>
        </section>
       
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