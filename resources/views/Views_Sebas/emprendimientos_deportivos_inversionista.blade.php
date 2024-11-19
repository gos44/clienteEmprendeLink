
@extends('layouts.Nav-Bar_Inversionista')

<!DOCTYPE html>
<html lang="es">
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Emprende Link</title>
        <link rel="stylesheet" href="{{ asset('css/busqueda_filtro_usuario.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    </head>
<body>
     <!-- Navbar container -->
     <div id="navbar-container"></div>

     <!-- Scripts -->
     <script src="Scrips/navbarInversionista.js"></script>

  <!-- Navbar container -->
  <div id="navbar-container"></div>

  <!-- Scripts -->
  <script src="Scrips/navbarInversionista.js"></script>




  <div class="container-bar">
    <div class="sidebar-content">
        <div class="header-section">
            <h2>EMPRENDE LINK</h2>
            <div class="search-section">
                <input type="text" id="searchInput" placeholder="Buscar...">
            </div>
        </div>
        <div class="divider"></div>
        <h3>Explorar Todo</h3>
          <ul>

            <li><a href="{{ asset('Buscar_Emprendimientos_inversionista') }}"><img src="images/deportes.png" alt="Artículos deportivos">Todos los empredimientos</a></li>
            <li><a href="{{ asset('emprendimientos_deportivos_inversionista') }}" style="color: rgb(67, 184, 67);"><img src="images/deportes.png" alt="Artículos deportivos">Emprendimientos deportivos</a></li>
            <li><a href="articulos_hogarinver.html"><img src="images/hogar.png" alt="Artículos deportivos">Emprendimientos sobre articulos de la casa hogar</a></li>
            <li><a href="articulos_electronicosinver.html"><img src="images/electronica.png" alt="Electrónica">Empredimientos sobre Electrónica</a></li>
            <li><a href="#"><img src="images/indumentaria.png" alt="Indumentaria">Emprendimientos de indumentaria</a></li>
            <li><a href="#"><img src="images/musica.png" alt="Instrumentos musicales">Empredimientos sobre musica</a></li>
            <li><a href="#"><img src="images/mascotas.png" alt="Productos para mascotas">Empredimientos sobre productos para mascotas</a></li>
            <li><a href="#"><img src="images/oficina.png" alt="Suministros de oficina">Empredimientos sobre suministros de oficina</a></li>
            <li><a href="#"><img src="images/artesanias.png" alt="Artesanías">Empredimientos sobre artesanías</a></li>
            <li><a href="#"><img src="images/herramientas.png" alt="Herramientas de trabajo">Empredimientos sobre herramientas de trabajo</a></li>
            <li><a href="#"><img src="images/educacion.png" alt="Educación">Empredimientos sobre educación</a></li>
            <li><a href="#"><img src="images/alimentacion.png" alt="Alimentación"> Empredimientos de alimentos  </a></li>
            <li><a href="#"><img src="images/vehiculos.png" alt="Vehículos"> Empredimientos sobre Vehículos</a></li>
        </ul>
      </div>

      <main class="main-content">
        <h2>RESULTADOS DE BUSQUEDA...</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <img src="https://images.pexels.com/photos/2128377/pexels-photo-2128377.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Fondo de Medias de rosita" class="background-img">
                    <img src="images/mediasrosita.jpeg" alt="Logo de Medias de rosita" class="logo-img">
                    <h3>Medias de rosita</h3>
                    <p>"Medias 100% elaboradas a base de materiales reciclables hechas por manos colombianas y mujeres guerreras echadas para adelante queriendo el bien común."</p>
                    <button><a href="">Visitar</a></button>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <img src="https://images.pexels.com/photos/13429315/pexels-photo-13429315.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Fondo de Cascos reciclados" class="background-img">
                    <img src="images/cascosreciclados.jpeg" alt="Logo de Cascos reciclados" class="logo-img">
                    <h3>Cascos reciclados</h3>
                    <p>Emprendimiento dedicado a la venta de cascos de alta calidad para ciclistas. Nuestro enfoque está en ofrecer protección a aquellos que disfrutan de moverse en bicicleta.</p>
                    <button><a href="">Visitar</a></button>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <img src="https://images.pexels.com/photos/954254/pexels-photo-954254.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Fondo de GorraStyle" class="background-img">
                    <img src="images/gorrasbien.jpeg" alt="Logo de GorraStyle" class="logo-img">
                    <h3>GorraStyle</h3>
                    <p>GorraStyle es un emprendimiento especializado en la creación y venta de gorras únicas y personalizadas. Nos enfocamos en ofrecer una variedad de estilos.</p>
                    <button><a href="">Visitar</a></button>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <img src="https://images.pexels.com/photos/1598505/pexels-photo-1598505.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Fondo de Zapatos Únicos" class="background-img">
                    <img src="images/zapatosunicos.jpeg" alt="Logo de Zapatos Únicos" class="logo-img">
                    <h3>Zapatos Únicos</h3>
                    <p>Zapatos Únicos es un emprendimiento dedicado a la creación y venta de calzado personalizado y de alta calidad. Nos especializamos en ofrecer una amplia gama de zapatos.</p>
                    <button><a href="">Visitar</a></button>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <img src="https://images.pexels.com/photos/163403/box-sport-men-training-163403.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Fondo de Guantes de Combate" class="background-img">
                    <img src="images/guanteschimbas.jpeg" alt="Logo de Guantes de Combate" class="logo-img">
                    <h3>Guantes de Combate</h3>
                    <p>Guantes de Combate es un emprendimiento especializado en la fabricación y venta de guantes de boxeo de alta calidad. Nuestro objetivo es proporcionar a los boxeadores y entusiastas del deporte un equipo que combine protección, comodidad y estilo.</p>
                    <button><a href="">Visitar</a></button>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <img src="https://images.pexels.com/photos/1198169/pexels-photo-1198169.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Fondo de Guallos Funtobol" class="background-img">
                    <img src="images/gualloschimbas.jpeg" alt="Logo de Guallos Funtobol" class="logo-img">
                    <h3>Guallos Funtobol</h3>
                    <p>Guallos Funtobol es un emprendimiento innovador que se especializa en la fabricación y venta de guayos (botines) para el fútbol, diseñados específicamente para maximizar el rendimiento y la comodidad de los jugadores en el campo.</p>
                    <button><a href="">Visitar</a></button>
                </div>
            </div>
            <div class="pagination">
                <button class="page-btn" disabled>&laquo;</button>
                <button class="page-btn active">1</button>
                <button class="page-btn">2</button>
                <button class="page-btn">3</button>
                <button class="page-btn">&raquo;</button>
            </div>
        </div>
    </main>
    </div>









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

  //filtro




</script>

</body>
</html>
<script>
// Filtrar resultados de búsqueda
const searchInput = document.getElementById('searchInput');
const cardsContainer = document.querySelector('.row');

searchInput.addEventListener('input', function () {
 const searchTerm = this.value.toLowerCase();
 const cards = document.querySelectorAll('.col-md-6');

 cards.forEach(card => {
     const title = card.querySelector('h3').textContent.toLowerCase();
     const description = card.querySelector('p').textContent.toLowerCase();

     if (title.includes(searchTerm) || description.includes(searchTerm)) {
         card.classList.remove('hidden');
         card.style.display = '';
     } else {
         card.classList.add('hidden');
         card.style.display = 'none';
     }
 });
});



document.addEventListener('DOMContentLoaded', function() {
const paginationButtons = document.querySelectorAll('.page-btn');

// URLs para cada página
const pageUrls = {
   1: 'busqueda_filtro_inver.html',
   2: 'articulos_deportivosinver.html',
   3: 'articulos_hogarinver.html'
};

paginationButtons.forEach(button => {
   button.addEventListener('click', function() {
       if (this.disabled) return;

       // Obtener el número de página del botón
       const pageNum = this.textContent;

       // Si es flecha anterior o siguiente
       if (pageNum === '«') {
           const activePage = document.querySelector('.page-btn.active');
           const prevPage = parseInt(activePage.textContent) - 1;
           if (pageUrls[prevPage]) {
               window.location.href = pageUrls[prevPage];
           }
       } else if (pageNum === '»') {
           const activePage = document.querySelector('.page-btn.active');
           const nextPage = parseInt(activePage.textContent) + 1;
           if (pageUrls[nextPage]) {
               window.location.href = pageUrls[nextPage];
           }
       } else if (pageUrls[pageNum]) {
           window.location.href = pageUrls[pageNum];
       }
   });
});
});
</script>

</body>
</html>
