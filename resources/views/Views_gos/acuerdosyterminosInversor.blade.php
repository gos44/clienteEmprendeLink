<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cssgos/acuerdosyterminosInversor.css">
    <title>Emprende Link</title>
    <link rel="icon" href="img/logoCuadrado.png" type="image/png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    


</head>

<body>
  
  <!-- Navbar container -->
  <div id="navbar-container"></div>

  <!-- Scripts -->
  <script src="Scrips/navbarInversionista.js"></script>




    <div class="container">
      <div class="cont">
          <h1>Acuerdos y Términos de Uso</h1>
          <h2>1. Aceptación de los Términos</h2>
          <p>Al acceder y utilizar esta página web, aceptas cumplir con estos términos y condiciones de uso, todas las leyes y regulaciones aplicables, y aceptas que eres responsable de cumplir con cualquier ley local aplicable. Si no estás de acuerdo con alguno de estos términos, no deberías usar o acceder a esta página.</p>
          <br>
          <h2>2. Descripción del Servicio</h2>
          <p>Nuestra página web proporciona una plataforma en línea para emprendedores e inversionistas que permite la interacción, el intercambio de ideas y la colaboración. Los usuarios pueden crear perfiles, publicar contenido, y conectar con otros usuarios.</p>
          <br><h2>3. Registro y Seguridad</h2>
          <p>Para utilizar ciertos servicios, es posible que necesites registrarte y proporcionar información personal. Debes asegurarte de que la información proporcionada es precisa y actualizada. Eres responsable de mantener la confidencialidad de tu cuenta y contraseña, y de todas las actividades que ocurran bajo tu cuenta.</p>
         <br> <h2>4. Conducta del Usuario</h2>
          <p>Como condición de uso, te comprometes a no usar la página web para ningún propósito que sea ilegal o prohibido por estos términos. Esto incluye, pero no se limita a:</p>
          <ul style="list-style-type: disc; padding-left: 20px;">
            <li>No acosar, amenazar, o intimidar a otros usuarios.</li>
            <li>No publicar contenido que sea falso, engañoso, difamatorio, obsceno, o de otra manera ofensivo.</li>
            <li>No usar la página para cualquier actividad comercial no autorizada.</li>      
         </ul>
         <br> <h2>5. Propiedad Intelectual</h2>
          <p>Todo el contenido, diseño, texto, gráficos y otros materiales en esta página web están protegidos por derechos de autor, marcas registradas y otras leyes de propiedad intelectual. No puedes reproducir, distribuir, modificar, o crear trabajos derivados de cualquier parte del contenido sin el permiso explícito del propietario.</p>
         <br> <h2>6. Contenido del Usuario</h2>
          <p>Al publicar contenido en nuestra página web, otorgas a la compañía una licencia no exclusiva, mundial, libre de regalías, sublicenciable y transferible para usar, reproducir, distribuir, preparar trabajos derivados, mostrar y ejecutar dicho contenido en relación con el servicio.</p>
         <br> <h2>7. Enlaces a Sitios de Terceros</h2>
          <p>Nuestra página web puede contener enlaces a sitios web de terceros. No tenemos control sobre el contenido, las políticas de privacidad, o las prácticas de estos sitios web, y no podemos asumir ninguna responsabilidad por ellos. Accedes a estos sitios bajo tu propio riesgo.</p>
         <br> <h2>8. Exención de Responsabilidad</h2>
          <p>El uso de nuestra página web es bajo tu propio riesgo. La página y su contenido se proporcionan "tal cual" y "según disponibilidad". No ofrecemos garantías de ningún tipo, ya sean expresas o implícitas, sobre el funcionamiento del sitio web o la información, contenido, materiales o productos incluidos en él.</p>
          <br><h2>9. Limitación de Responsabilidad</h2>
          <p>En ningún caso seremos responsables por daños indirectos, incidentales, especiales, consecuentes o punitivos que resulten de tu uso o la imposibilidad de usar la página web, incluso si hemos sido advertidos de la posibilidad de tales daños.</p>
         <br> <h2>10. Modificaciones a los Términos</h2>
          <p>Nos reservamos el derecho de modificar estos términos en cualquier momento. Te notificaremos sobre los cambios a través de nuestra página web. Al continuar utilizando la página web después de tales modificaciones, aceptas estar sujeto a los términos modificados.</p>
        <br>  <h2>11. Terminación</h2>
          <p>Podemos, a nuestra discreción, suspender o terminar tu acceso a la página web, sin previo aviso, por cualquier violación de estos términos o por cualquier otra conducta que consideremos inapropiada o ilegal.</p>
         <br> <h2>12. Ley Aplicable</h2>
          <p>Estos términos se regirán e interpretarán de acuerdo con las leyes del país en el que se encuentra la empresa, sin tener en cuenta sus disposiciones sobre conflictos de leyes.</p>
          <br><h2>13. Contacto</h2>
          <p>Si tienes alguna pregunta sobre estos términos, por favor contáctanos a través de emprendelink234@gmail.com.</p>
      </div>
  </div>
  <div id="footer"></div>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      fetch("footerInversor.html")
        .then(response => response.text())
        .then(data => {
          document.getElementById("footer").innerHTML = data;
        });
    });
  </script>
    
    <script>
        document.querySelector('.menu-toggle').addEventListener('click', function() {
            this.classList.toggle('active');
            document.querySelector('.sidebar').classList.toggle('active');
        });

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
    </script>
</body>
</html>
