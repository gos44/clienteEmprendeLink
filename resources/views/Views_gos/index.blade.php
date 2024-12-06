@extends('layouts.Footer_Home')

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Emprede Link</title>

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
      <link rel="stylesheet" href="{{ asset('css/index.css') }}">

      <header>
        <div class="header-left">
          <img src="{{ asset('LINK/16.png') }}" alt="Emprende Link4" width="240px">
              </div>


        <div class="header-right">
          <a href="{{ route('ContactanosHome') }}"><i class="fas fa-question-circle"></i> Ayuda</a>
          <a href="{{ route('registrar_nuevo_usuario.store') }}"><i class="fas fa-question-circle"></i> Regístrate ahora</a>
          <a href="{{ route('iniciar_sesion_usuario.login') }}"><i class="fas fa-question-circle"></i> Iniciar Sesion</a>
      </div>
              </div>
          </div>
      </div>

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
                        <a href=" {{ route('registrar_nuevo_usuario.store') }}">Regístrate Con Nosotros</a>
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
                            <a href="{{ route('registrar_nuevo_usuario.store') }}"><i class="fas fa-question-circle"></i> Regístrate ahora</a>
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
                      <span class="thq-body-small"><a href="{{ route('iniciar_sesion_usuario.login') }}">Publicar ahora</a></span>

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



      </div>
          <!--Footer4 component-->


    </div>
    <script
      defer=""
      src=""
    ></script>
  </body>
</html>
