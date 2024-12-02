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

    <div class="navigation">
        <div class="page">1</div>
        <div class="line"></div>
        <div class="page">2</div>
        <div class="line"></div>
        <div class="page active">3</div>
    </div>

    <div class="container">
        <h2>Registro de Emprendimiento</h2>
        <br>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('/publicar-emprendimiento/paso-3') }}" id="final-form">
            @csrf
            <div class="form-sections">
                <div class="form-section">
                    <div class="form-group">
                        <label for="descripcion_general">Añade una gran descripción general de todo tu emprendimiento</label>
                        <textarea id="descripcion_general" name="descripcion_general" required>{{ old('descripcion_general') }}</textarea>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn-publicar" id="publicarBtn">Publicar</button>
        </form>

        <!-- Modal -->
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <p>¡Emprendimiento Publicado!</p>
                <a href="{{ route('MisEmpredimientos.index') }}" class="btn-aceptar">Aceptar</a>
            </div>
        </div>
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




    
   
<script src="{{ asset('js/Publicar_Emprendimiento.js') }}"></script>
</body>
</html>