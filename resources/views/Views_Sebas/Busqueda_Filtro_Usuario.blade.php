@extends('layouts.Nav-Bar_Usuario')


<!DOCTYPE html>
<html lang="es">


    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Emprende Link buscar emprendimientos</title>
        <link rel="stylesheet" href="{{ asset('css/busqueda_filtro_usuario.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    </head>
<body>


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
              <li><a href="busqueda_filtro.html"><img src="images/deportes.png" alt="Artículos deportivos">Todos los empredimientos</a></li>
              <li><a href="{{ route('emprendimientos_deportivos_usuario') }}"><img src="images/deportes.png" alt="Artículos deportivos">Emprendimientos deportivos</a></li>
              <li><a href="articulos_hogar.html"><img src="images/deportes.png" alt="Artículos para el hogar">Emprendimientos sobre articulos de la casa hogar</a></li>
              <li><a href="articulos_electronicos.html"><img src="images/electronica.png" alt="Electrónica">Empredimientos sobre Electrónica</a></li>
              <li><a href="#"><img src="images/indumentaria.png" alt="Indumentaria">Emprendimientos de indumentaria</a></li>
              <li><a href="#"><img src="images/musica.png" alt="Instrumentos musicales">Empredimientos sobre musica</a></li>
              <li><a href="#"><img src="images/mascotas.png" alt="Productos para mascotas">Empredimientos sobre productos para mascotas</a></li>
              <li><a href="#"><img src="images/oficina.png" alt="Suministros de oficina">Empredimientos sobre suministros de oficina</a></li>
              <li><a href="#"><img src="images/artesanias.png" alt="Artesanías">Empredimientos sobre artesanías</a></li>
              <li><a href="#"><img src="images/herramientas.png" alt="Herramientas de trabajo">Empredimientos sobre herramientas de trabajo</a></li>
              <li><a href="#"><img src="images/educacion.png" alt="Educación">Empredimientos sobre educación</a></li>
              <li><a href="#"><img src="images/alimentacion.png" alt="Alimentación">Empredimientos de alimentos</a></li>
              <li><a href="#"><img src="images/vehiculos.png" alt="Vehículos">Empredimientos sobre Vehículos</a></li>
          </ul>
      </div>

        <main class="main-content">
            <h2>RESULTADOS DE BUSQUEDA...</h2>
            <div class="row">
                <div class="col-md-6">
                  <div class="card">
                    <img src="images/FONDO-VINOS.png" alt="Fondo de [emprendimiento]" class="background-img">
                    <img src="images/vino.png" alt="Logo de [emprendimiento]" class="logo-img">
                    <h3>  VINO EL EXTASIS</h3>
                    <p>"AQUEL QUE VINO AL MUNDO Y NO TOMA VINO, ¿ENTONCES A QUÉ VINO?"</p>
                    <button><a href="{{ route('Visitar_Emprendimiento_Usuario.index') }}">Visitar</a></button>
                </div>
                </div>
                <div class="col-md-6">
                  <div class="card">
                    <img src="images/arepa_fondo.png" alt="Fondo de [emprendimiento]" class="background-img">
                    <img src="images/arepas.png" alt="Logo de [emprendimiento]" class="logo-img">
                    <h3>AREPA PURO MAIZ</h3>
                    <p>"Somos un emprendimiento enfocado en el procesamiento y comercialización de arepas de todo tipo"</p>
                    <button><a href="{{ route('Visitar_Emprendimiento_usuario_2.index') }}">Visitar</a></button>
                </div>
                </div>
                <div class="col-md-6">
                  <div class="card">
                    <img src="https://cdn.pixabay.com/photo/2016/01/22/02/13/meat-1155132_1280.jpg" alt="Fondo de [emprendimiento]" class="background-img">
                    <img src="images/carne.png" alt="Logo de [emprendimiento]" class="logo-img">
                    <h3>  CARNES LA BUENA VACA</h3>
                    <p>"Somos un emprendimiento enfocado en el procesamiento de carnes rojas."</p>
                    <button><a href="{{ route('Visitar_Emprendimiento_Usuario.index') }}">Visitar</a></button>
                </div>
                </div>
                <div class="col-md-6">
                  <div class="card">
                    <img src="https://cdn.pixabay.com/photo/2016/11/18/14/05/brick-wall-1834784_1280.jpg" alt="Fondo de [emprendimiento]" class="background-img">
                    <img src="images/restaurante.png" alt="Logo de [emprendimiento]" class="logo-img">
                    <h3>RESTAURANTE DON MIGUEL</h3>
                    <p>"Restaurante familiar enfocado en darle la mayor atención al cliente.</p>
                    <button><a href="{{ route('Visitar_Emprendimiento_Usuario.index') }}">Visitar</a></button>
                </div>
                </div>
                <div class="col-md-6">
                  <div class="card">
                    <img src="images/FONDO-VINOS.png" alt="Fondo de [emprendimiento]" class="background-img">
                    <img src="images/vino.png" alt="Logo de [emprendimiento]" class="logo-img">
                    <h3>  VINO EL EXTASIS</h3>
                    <p>"AQUEL QUE VINO AL MUNDO Y NO TOMA VINO, ¿ENTONCES A QUÉ VINO?"</p>
                    <button><a href="{{ route('Visitar_Emprendimiento_Usuario.index') }}">Visitar</a></button>
                </div>
                </div>
                <div class="col-md-6">
                  <div class="card">
                    <img src="images/arepa_fondo.png" alt="Fondo de [emprendimiento]" class="background-img">
                    <img src="images/arepas.png" alt="Logo de [emprendimiento]" class="logo-img">
                    <h3>AREPA PURO MAIZ</h3>
                    <p>"Somos un emprendimiento enfocado en el procesamiento y comercialización de arepas de todo tipo"</p>
                    <button><a href="{{ route('Visitar_Emprendimiento_Usuario.index') }}">Visitar</a></button>
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

</main>
</div>
    


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
        1: 'busqueda_filtro.html',
        2: 'articulos deportivos.html',
        3: 'articulos_hogar.html'
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
