
@extends('layouts.Nav-Bar_Inversionista')
@extends('layouts.Footer_Inversor')


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home Inversor</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  
    
    <link rel="stylesheet" href="{{ asset('css/home_inversor.css') }}">
</head>
<body>
 

    <section class="hero">
        
        <h1>Invierte en nuevas empresas en desarrollo!</h1>
        <p>Conectando ideas, impulsando negocios</p>
        <div class="search-bar">
            <input type="text" placeholder="Buscar..."  >
            
        </div>
    </section>
    <br><br>
    <h2>¿Qué Puedes Hacer?</h2>
    <div class="main-options">
        <div class="option1">
            <img src="images/comunicarImagen.png" alt="Comunicate con los emprendedores">
            <h3>Comunicate con los emprendedores</h3>
            <p>Conectamos a emprendedores con ideas innovadoras y prometedoras con inversionistas ávidos de oportunidades de inversión. A través de nuestra plataforma, los emprendedores pueden presentar sus proyectos empresariales de manera convincente, mientras que los inversionistas pueden descubrir y evaluar nuevas oportunidades de inversión.</p>
            
            
        </div>
        <div class="right-options">
          <div class="option2">
            <img src="images/invierte.png" alt="Invierte">
            <div class="text-content">
                <h3>Busca emprendedores</h3>
                <p>Conecta con emprendedores visionarios que buscan apoyo para llevar sus proyectos al siguiente nivel. Juntos, podemos transformar ideas innovadoras en éxitos.</p>
            </div>
           
        </div>        
            <div class="option2">
                <img src="images/emprende.png" alt="Emprendimientos">
                <div class="text-content">
                    <h3>Emprendimientos</h3>
                    <p>Busca emprendimientos que te gusten o con potencial para que crezca su patrimonio.</p>
                </div>
                <a href="{{ route('filtrar_inver') }}" class="btn">Ver más</a>
            </div>
        </div>
    </div>

    <br><br><br>
    


<script>
    /*menu*/
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
