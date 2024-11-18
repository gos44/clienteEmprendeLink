
@extends('layouts.Nav-Bar_Inversionista')
@extends('layouts.Footer_Inversor')


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emprende Link - Mercado de Vinos</title>
    <link rel="icon" href="img/logoCuadrado.png" type="image/png">

    <link rel="stylesheet" href="CSS/MI-EMPRENDIMIENTO.CSS">
    <link rel="stylesheet" href="{{ asset('css/Mi_Emprendimiento.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">  

</head>



<main>
  <div class="main-content">
    <section class="hero">
      <div class="hero-background">
          <img src="images/FONDO-VINOS.png" alt="Mercado de Vinos">
      </div>
      <div class="hero-overlay"></div>
      <div class="hero-content">
          <div class="hero-main">
              <img src="images/LOGO-VINOS.png" alt="Mercado de Vinos Logo" class="hero-logo">
              <h1>Vino el Éxtasis</h1>
              <p class="hero-quote">"Aquel que vino al mundo y no toma vino, ¿entonces a qué vino?"</p>
          </div>
          <div class="hero-buttons">
              <a href="reseñas.html" class="btn btn-primary">Reseñas</a>
              <a href="CHAT-EMPRENDEDOR.HTML" class="btn btn-secondary">Mensaje</a>
          </div>
      </div>
  </section>

    <section class="profile">
        <div class="profile-card">
            <img src="images/perfil.png" alt="Cristian Sebastian Delgado" class="profile-image">
            <div class="profile-info">
                <h2>CRISTIAN SEBASTIAN DELGADO</h2>
                <p><i class="fas fa-envelope"></i> <a href="mailto:cristiansdp@gmail.com">cristiansdp@gmail.com</a></p>
                <p><i class="fas fa-map-marker-alt"></i> 40 - Jersey City, Gal / 86551</p>
                <p><i class="fas fa-phone"></i> 320-898-7646</p>
                <p><i class="fas fa-city"></i> Popayán</p>
            </div>
        </div>
    </section>

      <div class="content">
          <section class="products">
              <div class="product">
                <img src="https://cdn.pixabay.com/photo/2017/06/27/14/37/wines-2447514_1280.jpg" alt="Vino tinto Malbec argentino">
                  <div class="product-info">
                      <h4>Vino tinto Malbec argentino</h4>
                      <p>Intenso y robusto, con notas de frutas negras y un toque de vainilla. Perfecto para acompañar carnes rojas.</p>
                  </div>
              </div>
              <div class="product">
                <img src="https://cdn.pixabay.com/photo/2020/04/09/15/54/wines-5022033_1280.png" alt="Vino rosado Pinot Noir de Francia">
                  <div class="product-info">
                      <h4>Vino rosado Pinot Noir de Francia</h4>
                      <p>Delicado y fresco, con aromas de fresas y un final cítrico. Ideal para tardes de verano y platos ligeros.</p>
                  </div>
              </div>
              <div class="product">
                <img src="https://cdn.pixabay.com/photo/2020/02/02/15/07/wine-4813260_1280.jpg" alt="Vino espumoso Brut Cava">
                  <div class="product-info">
                      <h4>Vino espumoso Brut Cava</h4>
                      <p>Burbujeante y elegante, con notas de manzana verde y pan tostado. Perfecto para celebraciones y aperitivos.</p>
                  </div>
              </div>
              <div class="product">
                <img src="https://cdn.pixabay.com/photo/2016/07/26/16/16/wine-1543170_1280.jpg" alt="Vino rosado">
                  <div class="product-info">
                      <h4>Vino rosado Provenzal</h4>
                      <p>Suave y aromático, con toques de melocotón y flores blancas. Excelente acompañante para mariscos y ensaladas.</p>
                  </div>
              </div>
          </section>

          <section class="description">
              <h3>Descripción</h3>
              <p>Experimenta la magia del vino: Un viaje sensorial único. Imagina un atardecer en el viñedo, donde los rayos dorados del sol acarician las vides maduras, listas para ser cosechadas. Cada botella de vino que elaboramos es el resultado de este mágico proceso, donde la tierra, el clima y la pasión de nuestros enólogos se combinan para crear una obra de arte líquida.</p>
              <p>Más que una bebida, una pasión: Embárcate en un viaje sensorial sin igual donde cada gota te invita a descubrir un universo de sabores, aromas y tradición. Desde la frescura frutal de un vino joven hasta la complejidad y profundidad de un añejo, cada sorbo es una nueva experiencia.</p>
              <p>Un legado familiar: Sumérgete en la historia que cada botella cuenta, un relato de tradición familiar, innovación y dedicación inquebrantable. Nuestra bodega ha sido testigo de generaciones que han dedicado sus vidas a perfeccionar su arte.</p>
          </section>
      </div>
  </div>
</main>

  



  
    
</body>
</html>
