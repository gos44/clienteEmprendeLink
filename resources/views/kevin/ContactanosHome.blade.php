<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ContactHome</title>
    <link rel="stylesheet" href="styles.css">
    <style>
      
    </style>
    <link rel="stylesheet" href="{{asset('css/contactanosHome.css')}}"> 
</head>
<body>
  <header>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <div class="header-left">
      
        <img src="LINK/16.png" alt="Emprende Link Logo" class="logo">
        
    </div>
    <div class="header-right">
        
      <a href="{{asset('Home1')}}" ><img src="images/flecha.png" alt=""></i> Atras</a>
    </div>
</header>
   
    <main>
        <section class="contact">
            <h2>Contactanos</h2>
            <p>Necesitas ayuda puedes escribirnos a estos numeros:</p>
            <p>Numeros: 3108596745 o 3108974856 o 31152867569</p>
            <p>Tambien puedes contactarnos con este correo:</p>
            <p>Correo: dayroncamilo@gmail.com</p>
            <div class="accordion">
                <div class="accordion-item">
                    <button class="accordion-button">Como cambiar la contraseña</button>
                    <div class="accordion-content">
                        <p>1. Abre la app de Configuración del dispositivo y presiona Emprende link. Administrar tu Cuenta de nombre.</p>
                        <p>2. En la parte superior, presiona Seguridad.</p>
                        <p>3. En la sección "Acceso a Emprende link", presiona Contraseña. Es posible que debas acceder.</p>
                        <p>4. Ingresa tu nueva contraseña y presiona Cambiar contraseña.</p>
                    </div>
                </div>
                <div class="accordion-item">
                    <button class="accordion-button">Como publicar un emprendimiento</button>
                    <div class="accordion-content">
                        <p>Detalles de cómo publicar un emprendimiento.</p>
                    </div>
                </div>
                <div class="accordion-item">
                    <button class="accordion-button">Como mirar mi emprendimiento</button>
                    <div class="accordion-content">
                        <p>Detalles de cómo mirar mi emprendimiento.</p>
                    </div>
                </div>
                <div class="accordion-item">
                    <button class="accordion-button">Como mirar como calificaron mi emprendimiento o que comentaron</button>
                    <div class="accordion-content">
                        <p>Detalles de cómo mirar cómo calificaron mi emprendimiento o qué comentaron.</p>
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

        
    </script>
</body>
</html>