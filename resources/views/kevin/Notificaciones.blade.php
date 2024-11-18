
@extends('layouts.Nav-Bar_Usuario')
@extends('layouts.Footer_Usuario')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>notifi1</title>
    <link rel="icon" href="img/logoCuadrado.png" type="image/png">
     <!-- Asegúrate de cargar Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">    <!-- Font Awesome -->

   
     <link rel="stylesheet" href="{{asset('css/notificaciones.css')}}"> 
    </head>
<body>
  


    <main>
        <section class="notifications">
            <h2>Notificaciones</h2>
            <div class="notification">
                <img src="images/lego.png" alt="LEGO">
                <div class="notification-content">
                    <a href="notificaciones3 copy.html"><h3>LEGO</h3></a>
                    <span class="time">3:15 PM</span>
                    <p>A career in website design can involve the design, creation, and coding of a range of website types. Other tasks will typically include liaising with clients and discussing website specifications, incorporating feedback, working on graphic design and image editing...</p>
                </div>
            </div>
            <div class="notification">
                <img src="https://i0.wp.com/www.elpoderdelasideas.com/wp-content/uploads/nuevo-logo-fanta-600x456.png?resize=600%2C456" alt="FANTA">
                <div class="notification-content">
                    <h3>FANTA</h3>
                    <span class="time">4:32 PM</span>
                    <p>A career in website design can involve the design, creation, and coding of a range of website types. Other tasks will typically include liaising with clients and discussing website specifications, incorporating feedback, working on graphic design and image editing...</p>
                </div>
            </div>
            <div class="notification">
                <img src="https://cdn.worldvectorlogo.com/logos/sprite-8.svg" alt="Sprite">
                <div class="notification-content">
                    <h3>Sprite</h3>
                    <span class="time">8:00 AM</span>
                    <p>A career in website design can involve the design, creation, and coding of a range of website types. Other tasks will typically include liaising with clients and discussing website specifications, incorporating feedback, working on graphic design and image editing...</p>
                </div>
            </div>
            <div class="notification">
                <img src="link/3.png" alt="Senaworks">
                <div class="notification-content">
                    <h3>Senaworks</h3>
                    <span class="time">11:15 AM</span>
                    <p>A career in website design can involve the design, creation, and coding of a range of website types. Other tasks will typically include liaising with clients and discussing website specifications, incorporating feedback, working on graphic design and image editing...</p>
                </div>
            </div>
        </section>
    </main>


    

    <script>
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