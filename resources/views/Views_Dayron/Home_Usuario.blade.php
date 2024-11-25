@extends('layouts.Nav-Bar_Usuario')
@extends('layouts.Footer_Usuario')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emprende Link</title>
    <link rel="stylesheet" href="{{ asset('css/Home_Usuario.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

   

    <main class="main-content">
      <div class="hero-section">
        <h1>¡¿Deseas impulsar tu emprendimiento?!</h1>
    
        <p>Conectando ideas, Impulsando negocios</p>
        <div class="hero-image-search">
          <input type="text" id="buscarInput" placeholder="Buscar..." onkeydown="redirigir(event)">
            <img src="images/pixelcut-export.jpeg" alt="Imagen de Hero">
        </div>
    </div>

      <section>
          <h2 class="section-title">¿Qué Puedes Hacer?</h2>
          <div class="action-cards">
              <div class="card">
                  <img src="https://cdn.pixabay.com/photo/2024/02/20/09/56/network-connections-8585083_1280.jpg" alt="Icono de chat" class="card-icon">
                  <div class="card-content">
                      <h3>Publicar Emprendimiento</h3>
                      <p>Comparte tu emprendimiento: descubre estrategias para conectar y establecer relaciones con personas y empresas.</p>
                      <a href="{{ route('Publicar_Emprendimiento1') }}" class="btn">Ver más</a>
                  </div>
              </div>
              <div class="card">
                  <img src="https://cdn.pixabay.com/photo/2024/08/03/10/09/business-8941891_1280.jpg" class="card-img">
                  <div class="card-content">
                      <h3>Conectate con más personas</h3>
                      <p>A través de esta asociación estratégica, buscamos maximizar el impacto, la eficiencia y el crecimiento.</p>
                      <a href="{{ route('listaUsuarios.index') }}" class="btn">Ver más</a>
                  </div>
              </div>
              <div class="card">
                  <img src="https://cdn.pixabay.com/photo/2020/04/04/03/42/chat-5000695_1280.png" alt="Emprendimientos" class="card-img">
                  <div class="card-content">
                    <h3>Conéctate con Inversionistas</h3>
                    <p>Habla directamente con inversionistas interesados en apoyar y financiar tu emprendimiento.</p>
                      <a href="{{ route('Chat_Usuario.index') }}" class="btn">Ver más</a>
                  </div>
              </div>
              <div class="card">
                  <img src="https://static-blog.onlyoffice.com/wp-content/uploads/2022/10/find-and-replace.png" alt="Solicita patrocinio" class="card-img">
                  <div class="card-content">
                    <h3>Explora Emprendimientos</h3>
                      <p>Explora una variedad de emprendimientos y conoce lo que cada uno ofrece.</p>
                      <a href="{{ route('filtrar_usuario') }}" class="btn">Ver más</a>
                  </div>
              </div>
          </div>
      </section>

  </main>
          




    <script>
        document.querySelector('.barra').addEventListener('click', function() {
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

  
//redireccion de input
 function redirigir(event) {
            // Verificar si la tecla presionada es "Enter"
            if (event.key === "Enter") {
                // Redirigir a otro archivo HTML
                window.location.href = "busqueda_filtro.html";
            }
        }
    </script>



</body>
</html>
