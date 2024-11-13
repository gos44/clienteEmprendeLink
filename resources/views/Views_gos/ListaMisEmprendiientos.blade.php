@extends('layouts.Nav-Bar_Usuario')
@extends('layouts.Footer_Usuario')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Emprendimientos</title>
    <link rel="icon" href="img/logoCuadrado.png" type="image/png">

    <link rel="stylesheet" href="{{ asset('css/ListaMisEmprendimientos.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>
<body>
  <h2 class="section-title-1">Mis Emprendimientos Publicados</h2>
            <section>
              <div class="latest-posts">
                  <div class="wine-post">
                      <div class="wine-post-header">
                          <img src="LINK/FONDO-VINOS.png" alt="Fondo de vino" class="background-img">
                          <img src="LINK/LOGO-VINOS.png" alt="Mercado de Vinos" class="logo-img">
                      </div>
                      <div class="wine-post-content">
                          <h3>VINO EL EXTASIS</h3>
                          <p class="quote">"AQUEL QUE VINO AL MUNDO Y NO TOMA VINO, ¿ENTONCES A QUÉ VINO?"</p>
                          <p class="description">Descubre una experiencia que va más allá de simplemente beber vino. En VINO EL ÉXTASIS, cada copa se convierte en un viaje que deleita todos tus sentidos. Más que una simple bebida, el vino es nuestra pasión, una forma de vida, y te invitamos a ser parte de este mundo fascinante.

                            Cada botella que ofrecemos ha sido seleccionada cuidadosamente para llevarte en un recorrido por las más exquisitas tierras vinícolas, donde la tradición y el arte de la viticultura se combinan en cada sorbo. Nuestros vinos no solo cuentan historias de siglos de dedicación, sino que también te transportan a un universo lleno de matices, desde los aromas afrutados hasta los sabores más complejos y refinados.</p>
                          <a href="{{ route('Mi_Emprendimiento.index') }}" class="butn">Mas Informacion...</a>

                      </div>
                  </div>
                 
                  
              </div>
              <div class="latest-posts">
                <div class="wine-post">
                    <div class="wine-post-header">
                        <img src="images/arepa_fondo.png" alt="Fondo de vino" class="background-img">
                        <img src="images/arepas.png" alt="Mercado de Vinos" class="logo-img">
                    </div>
                    <div class="wine-post-content">
                        <h3>AREPA PURO MAIZ</h3>
                        <p class="quote">"Somos un emprendimiento enfocado en el procesamiento y comercialización de arepas de todo tipo pero sobre todo las arepas de maiz."</p>
                        <p class="description">AREPA PURO MAÍZ es una empresa dedicada a la elaboración de auténticas arepas 100% de maíz, conservando la tradición y el sabor casero. Nuestro objetivo es ofrecer productos frescos, naturales y libres de aditivos, respetando las raíces culturales y gastronómicas de América Latina. Nos especializamos en brindar una experiencia culinaria única, utilizando ingredientes de alta calidad y fomentando el consumo consciente de alimentos nutritivos y deliciosos. En AREPA PURO MAÍZ, cada arepa está hecha con dedicación y pasión por la tradición, garantizando una explosión de sabor en cada bocado</p>
                        <a href="{{ route('Mi_Emprendimiento_2.index') }}" class="butn">Mas Informacion...</a>
                    </div>
                </div>
              </div>
                
                <div class="latest-posts">
                  <div class="wine-post">
                      <div class="wine-post-header">
                          <img src="images/arepa_fondo.png" alt="Fondo de vino" class="background-img">
                          <img src="images/arepas.png" alt="Mercado de Vinos" class="logo-img">
                      </div>
                      <div class="wine-post-content">
                          <h3>AREPA PURO MAIZ</h3>
                          <p class="quote">"Somos un emprendimiento enfocado en el procesamiento y comercialización de arepas de todo tipo pero sobre todo las arepas de maiz."</p>
                          <p class="description">AREPA PURO MAÍZ es una empresa dedicada a la elaboración de auténticas arepas 100% de maíz, conservando la tradición y el sabor casero. Nuestro objetivo es ofrecer productos frescos, naturales y libres de aditivos, respetando las raíces culturales y gastronómicas de América Latina. Nos especializamos en brindar una experiencia culinaria única, utilizando ingredientes de alta calidad y fomentando el consumo consciente de alimentos nutritivos y deliciosos. En AREPA PURO MAÍZ, cada arepa está hecha con dedicación y pasión por la tradición, garantizando una explosión de sabor en cada bocado</p>
                          <a href="MI-EMPRENDIMIENTO2.HTML" class="butn">Mas Informacion...</a>
                      </div>
                  </div>
                </div>

                <div class="latest-posts">
                  <div class="wine-post">
                      <div class="wine-post-header">
                          <img src="images/arepa_fondo.png" alt="Fondo de vino" class="background-img">
                          <img src="images/arepas.png" alt="Mercado de Vinos" class="logo-img">
                      </div>
                      <div class="wine-post-content">
                          <h3>AREPA PURO MAIZ</h3>
                          <p class="quote">"Somos un emprendimiento enfocado en el procesamiento y comercialización de arepas de todo tipo pero sobre todo las arepas de maiz."</p>
                          <p class="description">AREPA PURO MAÍZ es una empresa dedicada a la elaboración de auténticas arepas 100% de maíz, conservando la tradición y el sabor casero. Nuestro objetivo es ofrecer productos frescos, naturales y libres de aditivos, respetando las raíces culturales y gastronómicas de América Latina. Nos especializamos en brindar una experiencia culinaria única, utilizando ingredientes de alta calidad y fomentando el consumo consciente de alimentos nutritivos y deliciosos. En AREPA PURO MAÍZ, cada arepa está hecha con dedicación y pasión por la tradición, garantizando una explosión de sabor en cada bocado</p>
                          <a href="MI-EMPRENDIMIENTO2.HTML" class="butn">Mas Informacion...</a>
                      </div>
                  </div>
                </div>
        </section>
    
</body>
</html>
