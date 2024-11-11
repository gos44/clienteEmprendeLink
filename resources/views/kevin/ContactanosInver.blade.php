@extends('layouts.app')
@extends('layouts.Nav-Bar_Inversionista')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ContactInver</title>
    <link rel="stylesheet" href="{{asset('css/contactanosInver.css')}}"> 

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
   
  
</head>

<body>

  
    <main>
        <section class="contact">
            <h2>Contactanos</h2>
            <p>Necesitas ayuda puedes escribirnos a estos numeros:</p>
            <p>Numeros: 3108596745 o 3108974856 o 31152867569</p>
            <p>Tambien puedes contactarnos con este correo:</p>
            <p>Correo: fafagfa@gmail.com</p>
            <div class="accordion">
              <div class="accordion-item">
                <button class="accordion-button collapsed">
                    Como cambiar la contraseña
                    <span class="arrow"></span>
                </button>
                <div class="accordion-content">
                    <p>1. Abre la app de Configuración del dispositivo y presiona Emprende link. Administrar tu Cuenta de nombre.</p>
                    <p>2. En la parte superior, presiona Seguridad.</p>
                    <p>3. En la sección "Acceso a Emprende link", presiona Contraseña. Es posible que debas acceder.</p>
                    <p>4. Ingresa tu nueva contraseña y presiona Cambiar contraseña.</p>
                </div>
              </div>
              <div class="accordion-item">
                  <button class="accordion-button collapsed">
                      Como invertir en un emprendimiento
                      <span class="arrow"></span>
                  </button>
                  <div class="accordion-content">
                      <p>Detalles de cómo invertir en un emprendimiento.</p>
                  </div>
              </div>
              <div class="accordion-item">
                  <button class="accordion-button collapsed">
                      Como mirar los emprendimientos
                      <span class="arrow"></span>
                  </button>
                  <div class="accordion-content">
                      <p>Detalles de cómo mirar los emprendimientos apoyados.</p>
                  </div>
              </div>
              <div class="accordion-item">
                  <button class="accordion-button collapsed">
                      Como mirar cómo califican los emprendimientos
                      <span class="arrow"></span>
                  </button>
                  <div class="accordion-content">
                      <p>Detalles de cómo mirar cómo califican los emprendimientos y qué comentaron.</p>
                  </div>
              </div>
            </div>
        </section>
    </main>
    
    <script>
        document.querySelectorAll('.accordion-button').forEach(button => {
            button.addEventListener('click', () => {
                const accordionContent = button.nextElementSibling;
                button.classList.toggle('active');

                if (button.classList.contains('active')) {
                    accordionContent.style.maxHeight = accordionContent.scrollHeight + 'px';
                } else {
                    accordionContent.style.maxHeight = 0;
                }
            });
        });
        
        // window.onload = function() {
        //     alert('¡Bienvenido a Emprende Link!');
        // };


        
    </script>
</body>
</html>