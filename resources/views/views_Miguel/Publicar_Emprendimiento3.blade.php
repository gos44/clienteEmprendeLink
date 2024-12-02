@extends('layouts.Nav-Bar_Usuario') 
@extends('layouts.Footer_Usuario')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicar Emprendimiento - Paso 3</title>
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

        <form method="POST" action="{{ route('guardarPaso3') }}" id="final-form">
            @csrf
            <div class="form-sections">
                <div class="form-section">
                    <div class="form-group">
                        <label for="general_description">Añade una gran descripción general de todo tu emprendimiento</label>
                        <textarea id="general_description" name="general_description" required>{{ old('general_description') }}</textarea>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn-publicar" id="publicarBtn">Publicar</button>
        </form>

        <!-- Modal -->
        <div id="myModal" class="modal" style="display: none;">
            <div class="modal-content">
                <span class="close">&times;</span>
                <p>¡Emprendimiento Publicado!</p>
                <a href="{{ route('MisEmpredimientos.index') }}" class="btn-aceptar">Aceptar</a>
            </div>
        </div>
    </div>

    <!-- Lógica para el modal -->
    <script>
        // Obtener elementos
        var modal = document.getElementById("myModal");
        var form = document.getElementById("final-form");
        var span = document.getElementsByClassName("close")[0];

        // Mostrar el modal al enviar el formulario
        form.onsubmit = function(event) {
            event.preventDefault();
            modal.style.display = "block";
        };

        // Cerrar el modal al hacer clic en (x)
        span.onclick = function() {
            modal.style.display = "none";
        };

        // Cerrar el modal al hacer clic fuera de él
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        };
    </script>

    <script src="{{ asset('js/Publicar_Emprendimiento.js') }}"></script>
</body>
</html>
