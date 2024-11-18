@extends('layouts.app')
@extends('layouts.Nav-Bar_Usuario')
@extends('layouts.Footer_Usuario')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicar Emprendimiento</title>
    <link rel="stylesheet" href="{{ asset('css/Publicar_Emprendimiento3.css') }}">
</head>
<body>

    <br><br>
    <h1>¡Vamos a crear tu emprendimiento!</h1>
<!--linea 1 2 3 4 -->
<div class="navigation">
  <div class="page">1</div>
  <div class="line"></div>
  <div class="page">2</div>
  <div class="line"></div>
  <div class="page active">3</div>
  
</div>
<!-- fin linea 1 2 3 4 -->

<div class="container">
    <h2>Registro de Emprendimiento</h2>
    <br>
    <form>
        <div class="form-sections">
            <div class="form-section">
               
                <div class="form-group">
                    <label for="especificaciones">Añade una gran descripcion general de todo tu emprendimiento</label>
                    <textarea id="especificaciones" name="especificaciones"></textarea>
                </div>
            </div>
                       
                
                
            </div>
            <a href="#" class="btn-publicar" id="publicarBtn">Publicar</a>
        </div>
        <!-- Modal -->
        <div id="myModal" class="modal">
          <div class="modal-content">
              <span class="close">&times;</span>
              <p>¡Emprendimiento Publicado!</p>
              <a href="{{ route('MisEmpredimientos.index') }}" class="btn-aceptar">Aceptar</a>
          </div>
      </div>
    </form>
    
</div>
    

   
<!-- ventana de publicado -->
    <script>
      // Obtener elementos
      var modal = document.getElementById("myModal");
      var btn = document.getElementById("publicarBtn");
      var span = document.getElementsByClassName("close")[0];

      // Cuando el usuario hace clic en el botón, muestra el modal
      btn.onclick = function(event) {
          event.preventDefault();  // Previene que el enlace recargue la página
          modal.style.display = "block";
      }

      // Cuando el usuario hace clic en (x), cierra el modal
      span.onclick = function() {
          modal.style.display = "none";
      }

      // Cuando el usuario hace clic fuera del modal, cierra el modal
      window.onclick = function(event) {
          if (event.target == modal) {
              modal.style.display = "none";
          }
      }
  </script>




    
   
    
</body>
</html>