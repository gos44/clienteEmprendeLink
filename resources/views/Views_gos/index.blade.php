<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Emprede Link</title>
    <link rel="icon" href="img/logoCuadrado.png" type="image/png">

    <meta property="og:title" content="Ill Informed Cool Llama" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <meta property="twitter:card" content="summary_large_image" />

    <style data-tag="reset-style-sheet">
      html {  line-height: 1.15;}body {  margin: 0;}* {  box-sizing: border-box;  border-width: 0;  border-style: solid;}p,li,ul,pre,div,h1,h2,h3,h4,h5,h6,figure,blockquote,figcaption {  margin: 0;  padding: 0;}button {  background-color: transparent;}button,input,optgroup,select,textarea {  font-family: inherit;  font-size: 100%;  line-height: 1.15;  margin: 0;}button,select {  text-transform: none;}button,[type="button"],[type="reset"],[type="submit"] {  -webkit-appearance: button;}button::-moz-focus-inner,[type="button"]::-moz-focus-inner,[type="reset"]::-moz-focus-inner,[type="submit"]::-moz-focus-inner {  border-style: none;  padding: 0;}button:-moz-focus,[type="button"]:-moz-focus,[type="reset"]:-moz-focus,[type="submit"]:-moz-focus {  outline: 1px dotted ButtonText;}a {  color: inherit;  text-decoration: inherit;}input {  padding: 2px 4px;}img {  display: block;}html { scroll-behavior: smooth  }
    </style>
    <style data-tag="default-style-sheet">
      html {
        font-family: Inter;
        font-size: 16px;
      }

      body {
        font-weight: 400;
        font-style:normal;
        text-decoration: none;
        text-transform: none;
        letter-spacing: normal;
        line-height: 1.15;
        color: var(--dl-color-theme-neutral-dark);
        background: var(--dl-color-theme-neutral-light);

        fill: var(--dl-color-theme-neutral-dark);
      }
    </style>
    <link
      rel="stylesheet"
      href="https://unpkg.com/animate.css@4.1.1/animate.css"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
      data-tag="font"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=STIX+Two+Text:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&amp;display=swap"
      data-tag="font"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
      data-tag="font"
    />
    <link
      rel="stylesheet"
      href="https://unpkg.com/@teleporthq/teleport-custom-scripts/dist/style.css"
    />
  </head>
  <body>
    <div>
      <link href="cssgos/index.css" rel="stylesheet" />
      <header>
        <div class="header-left">
            <img src="link/16.png" alt="Emprende Link" width="240px">
        </div>


        <div class="header-right">
          <a href="acuerdosyterminosHome.html"><i class="fas fa-question-circle"></i> Ayuda</a>
          <a href="#" id="registroBtn">Registrarse</a>
          <a href="#" id="iniciarSesionBtn"><i class="fas fa-user"></i> Iniciar sesión</a>
      </div>
  
      <!-- Modal para opciones de registro -->
      <div id="registroModal" class="modal">
          <div class="modal-content">
              <span class="close-button" id="cerrarRegistroModal">&times;</span>
              <h2>Seleccione tipo de registro</h2>
              <div class="button-container">
                  <button onclick="window.location.href='registro_usuario.html'" class="modal-button">Usuario</button>
                  <button onclick="window.location.href='registro_inver1.html'" class="modal-button">Inversionista</button>
              </div>
          </div>
      </div>
  
      <!-- Modal para opciones de inicio de sesión -->
      <div id="inicioSesionModal" class="modal">
          <div class="modal-content">
              <span class="close-button" id="cerrarInicioSesionModal">&times;</span>
              <h2>Seleccione tipo de inicio de sesión</h2>
              <div class="button-container">
                  <button onclick="window.location.href='iniciosesion1_usuario.html'" class="modal-button">Usuario</button>
                  <button onclick="window.location.href='inicio_sesion_inver.html'" class="modal-button">Inversionista</button>
              </div>
          </div>
      </div>
  
      <script>
          document.addEventListener('DOMContentLoaded', function() {
              var registroModal = document.getElementById('registroModal');
              var inicioSesionModal = document.getElementById('inicioSesionModal');
              var registroBtn = document.getElementById('registroBtn');
              var iniciarSesionBtn = document.getElementById('iniciarSesionBtn');
              var cerrarRegistroModal = document.getElementById('cerrarRegistroModal');
              var cerrarInicioSesionModal = document.getElementById('cerrarInicioSesionModal');
  
              registroBtn.onclick = function(e) {
                  e.preventDefault();
                  registroModal.style.display = "block";
              }
  
              iniciarSesionBtn.onclick = function(e) {
                  e.preventDefault();
                  inicioSesionModal.style.display = "block";
              }
  
              cerrarRegistroModal.onclick = function() {
                  registroModal.style.display = "none";
              }
  
              cerrarInicioSesionModal.onclick = function() {
                  inicioSesionModal.style.display = "none";
              }
  
              window.onclick = function(event) {
                  if (event.target == registroModal) {
                      registroModal.style.display = "none";
                  }
                  if (event.target == inicioSesionModal) {
                      inicioSesionModal.style.display = "none";
                  }
              }
          });
      </script>

    </header>
      <div class="home-container">
    
        <hero17-wrapper class="hero17-wrapper">
          <!--Hero17 component-->
          <div class="hero17-header78">
            <div
              class="hero17-column thq-section-max-width thq-section-padding"
            >
              <div class="hero17-content1">
                <h1>
                  <fragment class="home-fragment117">
                    <span class="home-text117 thq-heading-1">
                      Conecta con inversionistas para hacer crecer tu
                      emprendimiento
                    </span>
                  </fragment>
                </h1>
                <p>
                  <fragment class="home-fragment116">
                    <span class="home-text116 thq-body-large">
                      Únete a nuestra plataforma en línea y accede a una red de
                      inversionistas interesados en apoyar proyectos
                      innovadores. ¡Haz crecer tu negocio con el respaldo
                      adecuado!
                    </span>
                  </fragment>
                </p>
              </div>
              <div class="hero17-actions">
                <button class="thq-button-filled hero17-button1">
                  <span>
                    <fragment class="home-fragment114">
                      <span class="home-text114 thq-body-small">
                        <a href="registro_usuario.html">Regístrate como emprendedor</a>
                      </span>
                    </fragment>
                  </span>
                </button>
                <button class="thq-button-outline hero17-button2">
                  <span>
                    <fragment class="home-fragment115">
                      <span class="home-text115 thq-body-small">
                        <a href="registro_inver1.html">Regístrate como inversionista</a>
                      </span>
                    </fragment>
                  </span>
                </button>
              </div>
            </div>
            
            <div class="hero17-content2">
              <div
                class="hero17-row-container1 thq-animated-group-container-horizontal thq-mask-image-horizontal"
              >
                <div class="thq-animated-group-horizontal">
                  <img
                    alt="Hero Image"
                    src="images/video.png"
                    class="hero17-placeholder-image10 thq-img-ratio-1-1 thq-img-scale"
                  />
                  <img
                    alt="Hero Image"
                    src="images/video2.jpg"
                    class="hero17-placeholder-image11 thq-img-ratio-1-1 thq-img-scale"
                  />
                  <img
                    alt="Hero Image"
                    src="images/video3.jpg"
                    class="hero17-placeholder-image12 thq-img-ratio-1-1 thq-img-scale"
                  />

                  <!-- tambiem se puede quitar este y queda mas unido  -->
                  <img
                    alt="Hero Image"
                    src="images/video4.jpg"
                    class="hero17-placeholder-image13 thq-img-ratio-1-1 thq-img-scale"
                  />
                </div>            
            </div>        
          </div>
        </hero17-wrapper>    
        <cta26-wrapper class="cta26-wrapper">
          <!--CTA26 component-->
          <div class="thq-section-padding">
            <div class="thq-section-max-width">
              <div class="cta26-accent2-bg">
                <div class="cta26-accent1-bg">
                  <div class="cta26-container2">
                    <div class="cta26-content">
                      <span>
                        <fragment class="home-fragment126">
                          <span class="home-text126 thq-heading-2">
                            ¡Únete a nuestra plataforma hoy!
                          </span>
                        </fragment>
                      </span>
                      <p>
                        <fragment class="home-fragment125">
                          <span class="home-text125 thq-body-large">
                            Conviértete en parte de nuestra comunidad de
                            emprendedores e inversionistas
                          </span>
                        </fragment>
                      </p>
                    </div>
                    <div class="cta26-actions">
                      <button
                        type="button"
                        class="thq-button-filled cta26-button"
                      >
                        <span>
                          <fragment class="home-fragment124">
                            <span class="home-text124"><a href="">Regístrate ahora</a></span>
                          </fragment>
                        </span>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </cta26-wrapper>
        <features25-wrapper class="features25-wrapper">
          <!--Features25 component-->
          <div class="thq-section-padding">
            <div class="features25-container2 thq-section-max-width">
              <div class="features25-tabs-menu">
                <div class="features25-tab-horizontal1">
                  <div class="features25-divider-container1">
                    <div class="features25-container3"></div>
                  </div>
                  <div class="features25-content1">
                    <h2>
                      <fragment class="home-fragment127">
                        <span class="home-text127 thq-heading-2">
                          Perfil de emprendedores e inversionistas
                        </span>
                      </fragment>
                    </h2>
                    <span>
                      <fragment class="home-fragment130">
                        <span class="home-text130 thq-body-small">
                          Crea un perfil detallado para mostrar tus proyectos
                          como emprendedor o tu interés en invertir. Destaca tus
                          habilidades, experiencia y logros para atraer a la
                          comunidad.
                        </span>
                      </fragment>
                    </span>
                  </div>
                </div>
                <div class="features25-tab-horizontal2">
                  <div class="features25-divider-container2">
                    <div class="features25-container4"></div>
                  </div>
                  <div class="features25-content2">
                    <h2>
                      <fragment class="home-fragment128">
                        <span class="home-text128 thq-heading-2">
                          Conexión directa
                        </span>
                      </fragment>
                    </h2>
                    <span>
                      <fragment class="home-fragment131">
                        <span class="home-text131 thq-body-small">
                          Conéctate con otros usuarios de la plataforma de forma
                          directa y sin intermediarios. Establece relaciones con
                          posibles socios o inversores para llevar tu proyecto
                          al siguiente nivel.
                        </span>
                      </fragment>
                    </span>
                  </div>
                </div>
                <div class="features25-tab-horizontal3">
                  <div class="features25-divider-container3">
                    <div class="features25-container5"></div>
                  </div>
                  <div class="features25-content3">
                    <h2>
                      <fragment class="home-fragment129">
                        <span class="home-text129 thq-heading-2">
                          Seguimiento de proyectos
                        </span>
                      </fragment>
                    </h2>
                    <span>
                      <fragment class="home-fragment132">
                        <span class="home-text132 thq-body-small">
                          Mantente al tanto del progreso de los proyectos que te
                          interesan. Recibe notificaciones sobre
                          actualizaciones, hitos alcanzados y oportunidades de
                          inversión.
                        </span>
                      </fragment>
                    </span>
                  </div>
                </div>
              </div>
              <div class="features25-image-container">
                <img
                  alt="Perfil de emprendedores e inversionistas"
                  src="images/idea.jpg"
                  class="features25-image1 thq-img-ratio-16-9"
                />
               
            </div>
          </div>
        </features25-wrapper>
        <pricing14-wrapper class="pricing14-wrapper">
          <!--Pricing14 component-->
          
        </pricing14-wrapper>
        <steps2-wrapper class="steps2-wrapper">

          
          <!--Steps2 component-->
          <div class="steps2-container1 thq-section-padding">
            <div class="steps2-max-width thq-section-max-width">
              <div class="steps2-container2 thq-grid-2">
                <div class="steps2-section-header">
                  <h2 class="thq-heading-2">
                    Descubre el potencial de tu emprendimiento
                  </h2>
                  <p class="thq-body-large">
                    Transforma tu idea en una realidad. Nuestro espacio está diseñado para impulsar y conectar a emprendedores como tú. Aprovecha herramientas y recursos para llevar tu proyecto al siguiente nivel.
                  </p>
                  <div class="steps2-actions">
                    <button
                      class="thq-button-filled thq-button-animated steps2-button"
                    >
                      <span class="thq-body-small"><a href="index.html">Publicar ahora</a></span>
                    </button>
                  </div>
                </div>
                
              
               <br>
                <div class="steps2-column">
                  <div class="steps2-container4 thq-card">
                    <h2>
                      <fragment class="home-fragment184">
                        <span class="home-text186 thq-heading-2">
                          Regístrate en la plataforma
                        </span>
                      </fragment>
                    </h2>
                    <span>
                      <fragment class="home-fragment188">
                        <span class="home-text190 thq-body-small">
                          Crea tu cuenta de usuario como emprendedor o
                          inversionista para acceder a todas las funcionalidades
                          de la plataforma.
                        </span>
                      </fragment>
                    </span>
                    <label class="steps2-text15 thq-heading-3">01</label>
                  </div>
                  <div class="steps2-container5 thq-card">
                    <h2>
                      <fragment class="home-fragment185">
                        <span class="home-text187 thq-heading-2">
                          Completa tu perfil
                        </span>
                      </fragment>
                    </h2>
                    <span>
                      <fragment class="home-fragment189">
                        <span class="home-text191 thq-body-small">
                          Proporciona información detallada sobre tu proyecto
                          como emprendedor o tus intereses como inversionista
                          para aumentar tus posibilidades de conexión.
                        </span>
                      </fragment>
                    </span>
                    <label class="steps2-text18 thq-heading-3">02</label>
                  </div>
                </div>
                <div class="steps2-column">
                  <div class="steps2-container6 thq-card">
                    <h2>
                      <fragment class="home-fragment186">
                        <span class="home-text188 thq-heading-2">
                          Explora proyectos e inversores
                        </span>
                      </fragment>
                    </h2>
                    <span>
                      <fragment class="home-fragment190">
                        <span class="home-text192 thq-body-small">
                          Descubre una amplia variedad de proyectos
                          emprendedores en busca de financiamiento o encuentra
                          inversionistas interesados en apoyar iniciativas
                          innovadoras.
                        </span>
                      </fragment>
                    </span>
                    <label class="steps2-text21 thq-heading-3">03</label>
                  </div>
                  <div class="steps2-container7 thq-card">
                    <h2>
                      <fragment class="home-fragment187">
                        <span class="home-text189 thq-heading-2">
                          Conéctate y colabora
                        </span>
                      </fragment>
                    </h2>
                    <span>
                      <fragment class="home-fragment191">
                        <span class="home-text193 thq-body-small">
                          Establece conexiones con otros usuarios, inicia
                          conversaciones, y colabora en el desarrollo de
                          proyectos exitosos a través de nuestra red social
                          especializada.
                        </span>
                      </fragment>
                    </span>
                    <label class="steps2-text24 thq-heading-3">04</label>
                  </div>
                </div>
              </div>
                      </fragment>
                    </span>
                    <label class="steps2-text24 thq-heading-3"></label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </steps2-wrapper>
        <testimonial17-wrapper class="testimonial17-wrapper">
          <!--Testimonial17 component-->
          <div class="thq-section-padding">
            <div class="testimonial17-max-width thq-section-max-width">
              <div class="testimonial17-container10">
                <h2>
                  <fragment class="home-fragment197">
                    <span class="home-text199 thq-heading-2">
                      Testimonios de nuestros usuarios
                    </span>
                  </fragment>
                </h2>
                <span>
                  <fragment class="home-fragment196">
                    <span class="home-text198 thq-body-small">
                      Gracias a esta plataforma, pude encontrar el
                      financiamiento necesario para hacer crecer mi negocio de
                      manera exitosa. ¡Totalmente recomendado!
                    </span>
                  </fragment>
                </span>
              </div>
              <div class="thq-grid-2">
                <div class="thq-animated-card-bg-2">
                  <div class="thq-animated-card-bg-1">
                    <div
                      data-animated="true"
                      class="thq-card testimonial17-card1"
                    >
                      <div class="testimonial17-container12">
                        <img
                          alt="Imagen de María López, CEO de Startup XYZ"
                          src="images/cuadrado.png"
                          class="testimonial17-image1"
                        />
                        <div class="testimonial17-container13">
                          <strong>
                            <fragment class="home-fragment198">
                              <span class="home-text200 thq-body-large">
                                María López
                              </span>
                            </fragment>
                          </strong>
                          <span>
                            <fragment class="home-fragment202">
                              <span class="home-text204 thq-body-small">
                                CEO de Startup XYZ
                              </span>
                            </fragment>
                          </span>
                        </div>
                      </div>
                      <span>
                        <fragment class="home-fragment192">
                          <span class="home-text194 thq-body-small">
                            Excelente plataforma para conectar con emprendedores
                            con proyectos innovadores. He invertido en varias
                            startups con gran potencial gracias a esta red.
                          </span>
                        </fragment>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="thq-animated-card-bg-2">
                  <div class="thq-animated-card-bg-1">
                    <div
                      data-animated="true"
                      class="thq-card testimonial17-card2"
                    >
                      <div class="testimonial17-container14">
                        <img
                          alt="Imagen de Juan Pérez, Inversionista Ángel"
                          src="images/perfilusu2.png"
                          class="testimonial17-image2"
                        />
                        <div class="testimonial17-container15">
                          <strong>
                            <fragment class="home-fragment199">
                              <span class="home-text201 thq-body-large">
                                Juan Pérez
                              </span>
                            </fragment>
                          </strong>
                          <span>
                            <fragment class="home-fragment203">
                              <span class="home-text205 thq-body-small">
                                Inversionista Ángel
                              </span>
                            </fragment>
                          </span>
                        </div>
                      </div>
                      <span>
                        <fragment class="home-fragment193">
                          <span class="home-text195 thq-body-small">
                            Como emprendedor, siempre es difícil conseguir el
                            respaldo financiero adecuado. Gracias a esta
                            plataforma, encontré el socio inversor perfecto para
                            llevar mi idea al siguiente nivel.
                          </span>
                        </fragment>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="thq-animated-card-bg-2">
                  <div class="thq-animated-card-bg-1">
                    <div
                      data-animated="true"
                      class="thq-card testimonial17-card3"
                    >
                      <div class="testimonial17-container16">
                        <img
                          alt="Imagen de Carolina Rodríguez, Inversionista en crecimiento"
                          src="images/mujer.jpg"
                          class="testimonial17-image3"
                        />
                        <div class="testimonial17-container17">
                          <strong>
                            <fragment class="home-fragment200">
                              <span class="home-text202 thq-body-large">
                                Carolina Rodríguez
                              </span>
                            </fragment>
                          </strong>
                          <span>
                            <fragment class="home-fragment204">
                              <span class="home-text206 thq-body-small">
                                Inversionista en crecimiento
                              </span>
                            </fragment>
                          </span>
                        </div>
                      </div>
                      <span>
                        <fragment class="home-fragment194">
                          <span class="home-text196 thq-body-small">
                            Me encanta la dinámica de esta plataforma. He
                            conocido emprendedores con propuestas realmente
                            interesantes y he podido ser parte de proyectos
                            innovadores que han tenido un impacto positivo.
                          </span>
                        </fragment>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="thq-animated-card-bg-2">
                  <div class="thq-animated-card-bg-1">
                    <div
                      data-animated="true"
                      class="thq-card testimonial17-card4"
                    >
                      <div class="testimonial17-container18">
                        <img
                          alt="Imagen de Pedro Martínez, Emprendedor en serie"
                          src="images/perfilusu1.png"
                          class="testimonial17-image4"
                        />
                        <div class="testimonial17-container19">
                          <strong>
                            <fragment class="home-fragment201">
                              <span class="home-text203 thq-body-large">
                                Pedro Martínez
                              </span>
                            </fragment>
                          </strong>
                          <span>
                            <fragment class="home-fragment205">
                              <span class="home-text207 thq-body-small">
                                Emprendedor en serie
                              </span>
                            </fragment>
                          </span>
                        </div>
                      </div>
                      <span>
                        <fragment class="home-fragment195">
                          <span class="home-text197 thq-body-small">
                            La facilidad de uso y la calidad de las conexiones
                            que se pueden establecer a través de esta plataforma
                            son impresionantes. Definitivamente ha sido clave en
                            el éxito de mis emprendimientos.
                          </span>
                        </fragment>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </testimonial17-wrapper>
        <contact10-wrapper class="contact10-wrapper">
          <!--Contact10 component-->
        </contact10-wrapper>
        
        
      </div>
          <!--Footer4 component-->
          <footer>
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
                      <li><a href="politicayprivacidadHome.html">Política de privacidad</a></li>
                      <li><a href="acuerdosyterminosHome.html">Acuerdos y términos</a></li>
                      <li><a href="sobreEmpredelinkHome.html">Sobre Emprende Link</a></li>
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
        </footer>
        
    </div>
    <script
      defer=""
      src=""
    ></script>
  </body>
</html>
