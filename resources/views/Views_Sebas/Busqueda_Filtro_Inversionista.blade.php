@extends('layouts.app')
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
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
     <!-- Navbar container -->
     <div id="navbar-container"></div>

     <!-- Scripts -->
     <script src="Scrips/navbarInversionista.js"></script>


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
              <li><a href="{{ asset('emprendimientos_deportivos_inversionista') }}"><img src="images/deportes.png" alt="Artículos deportivos">Empredimietos deportivos</a></li>
              <li><a href="articulos_hogarinver.html"><img src="images/deportes.png" alt="Artículos para el hogar">Emprendimientos sobre articulos de la casa hogar</a></li>
              <li><a href="articulos_electronicosinver.html"><img src="images/electronica.png" alt="Electrónica">Empredimientos sobre Electrónica</a></li>
              <li><a href="#"><img src="images/indumentaria.png" alt="Indumentaria">Empredimientos de indumentaria</a></li>
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
                <button><a href="{{ route('Visitar_Emprendimiento_Inversor.index') }}">Visitar</a></button>
            </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <img src="images/arepa_fondo.png" alt="Fondo de [emprendimiento]" class="background-img">
                <img src="images/arepas.png" alt="Logo de [emprendimiento]" class="logo-img">
                <h3>AREPA PURO MAIZ</h3>
                <p>"Somos un emprendimiento enfocado en el procesamiento y comercialización de arepas de todo tipo"</p>
                <button><a href="{{ route('Visitar_Emprendimiento_Inversor_2.index') }}">Visitar</a></button>
            </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <img src="https://cdn.pixabay.com/photo/2016/01/22/02/13/meat-1155132_1280.jpg" alt="Fondo de [emprendimiento]" class="background-img">
                <img src="images/carne.png" alt="Logo de [emprendimiento]" class="logo-img">
                <h3>  CARNES LA BUENA VACA</h3>
                <p>"Somos un emprendimiento enfocado en el procesamiento de carnes rojas."</p>
                <button><a href="{{ route('Visitar_Emprendimiento_Inversor_2.index') }}">Visitar</a></button>
            </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <img src="https://cdn.pixabay.com/photo/2016/11/18/14/05/brick-wall-1834784_1280.jpg" alt="Fondo de [emprendimiento]" class="background-img">
                <img src="images/restaurante.png" alt="Logo de [emprendimiento]" class="logo-img">
                <h3>RESTAURANTE DON MIGUEL</h3>
                <p>"Restaurante familiar enfocado en darle la mayor atención al cliente.</p>
                <button><a href="{{ route('Visitar_Emprendimiento_Inversor_2.index') }}">Visitar</a></button>
            </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <img src="images/FONDO-VINOS.png" alt="Fondo de [emprendimiento]" class="background-img">
                <img src="images/vino.png" alt="Logo de [emprendimiento]" class="logo-img">
                <h3>  VINO EL EXTASIS</h3>
                <p>"AQUEL QUE VINO AL MUNDO Y NO TOMA VINO, ¿ENTONCES A QUÉ VINO?"</p>
                <button><a href="{{ route('Visitar_Emprendimiento_Inversor_2.index') }}">Visitar</a></button>
            </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <img src="images/arepa_fondo.png" alt="Fondo de [emprendimiento]" class="background-img">
                <img src="images/arepas.png" alt="Logo de [emprendimiento]" class="logo-img">
                <h3>AREPA PURO MAIZ</h3>
                <p>"Somos un emprendimiento enfocado en el procesamiento y comercialización de arepas de todo tipo"</p>
                <button><a href="{{ route('Visitar_Emprendimiento_Inversor_2.index') }}">Visitar</a></button>
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


    <!-- <footer>
      <div class="footer-content">
          <div class="footer-section about">
              <div class="logoda">
                  <img class="logo-dark" src="images/logodark.png" alt="Emprende Link">
              </div>
              <h3></h3>
              <p>Emprende Link busca facilitar la colaboración y el crecimiento empresarial al conectar de manera eficiente a emprendedores con grandes inversores, creando oportunidades para el desarrollo conjunto de soluciones innovadoras.</p>
          </div>
          <div class="footer-section links">
            <h3>Legales</h3>
            <ul>
              <li><a href="sobreEmpredelinkInversor.html">Sobre Emprende Link</a></li>
                <li><a href="politicayprivacidadInversor.html">Política de privacidad</a></li>
                <li><a href="acuerdosyterminosInversor.html">Acuerdos y términos</a></li>
            </ul>
        </div>
        <div class="footer-section contact">
            <h3>Nuestro correo:</h3>
            <p><a href="mailto:emprendelink234@gmail.com">emprendelink234@gmail.com</a></p>
        </div>

      </div>

      <div class="footer-bottom">
        <p>&copy; Emprende Link - Copyright © 2024</p>
        <div class="imagenes">
            <ul class="example-2">
                <li class="icon-content">
                  <a
                    href="https://linkedin.com/"
                    aria-label="LinkedIn"
                    data-social="linkedin"
                  >
                    <div class="filled"></div>
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="16"
                      height="16"
                      fill="currentColor"
                      class="bi bi-linkedin"
                      viewBox="0 0 16 16"
                      xml:space="preserve"
                    >
                      <path
                        d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"
                        fill="currentColor"
                      ></path>
                    </svg>
                  </a>
                  <div class="tooltip">LinkedIn</div>
                </li>
                <li class="icon-content">
                  <a
                    href="https://twitter.com/"
                    aria-label="Twitter"
                    data-social="twitter"
                  >
                    <div class="filled"></div>
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="16"
                      height="16"
                      fill="currentColor"
                      class="bi bi-twitter"
                      viewBox="0 0 16 16"
                      xml:space="preserve"
                    >
                      <path
                        d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.283-.01-.422A6.72 6.72 0 0 0 16 3.542a6.558 6.558 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.084.797 3.286 3.286 0 0 0-2.397-1.034c-1.812 0-3.285 1.47-3.285 3.284 0 .258.03.51.086.751A9.325 9.325 0 0 1 1.112 2.6a3.284 3.284 0 0 0-.445 1.65c0 1.137.579 2.143 1.459 2.729a3.301 3.301 0 0 1-1.488-.41v.041c0 1.589 1.132 2.915 2.636 3.215a3.203 3.203 0 0 1-.865.115c-.212 0-.418-.021-.619-.059.42 1.313 1.633 2.266 3.067 2.292a6.588 6.588 0 0 1-4.065 1.4 6.32 6.32 0 0 1-.777-.045 9.344 9.344 0 0 0 5.034 1.474"
                        fill="currentColor"
                      ></path>
                    </svg>
                  </a>
                  <div class="tooltip">Twitter</div>
                </li>
                <li class="icon-content">
                  <a
                    href="https://www.instagram.com/"
                    aria-label="Instagram"
                    data-social="instagram"
                  >
                    <div class="filled"></div>
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="16"
                      height="16"
                      fill="currentColor"
                      class="bi bi-instagram"
                      viewBox="0 0 16 16"
                      xml:space="preserve"
                    >
                      <path
                        d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"
                        fill="currentColor"
                      ></path>
                    </svg>
                  </a>
                  <div class="tooltip">Instagram</div>
                </li>
                <li class="icon-content">
                  <a href="https://youtube.com/" aria-label="Youtube" data-social="youtube">
                    <div class="filled"></div>
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="16"
                      height="16"
                      fill="currentColor"
                      class="bi bi-youtube"
                      viewBox="0 0 16 16"
                      xml:space="preserve"
                    >
                      <path
                        d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z"
                        fill="currentColor"
                      ></path>
                    </svg>
                  </a>
                  <div class="tooltip">Youtube</div>
                </li>
              </ul>

        </div>
    </div>
  </footer> -->

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
