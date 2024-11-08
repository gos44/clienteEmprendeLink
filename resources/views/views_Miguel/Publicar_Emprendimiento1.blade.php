@extends('layouts.app')
@extends('layouts.Nav-Bar_Usuario')
@extends('layouts.Footer_Usuario')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicar Emprendimiento</title>

    <link rel="stylesheet" href="{{ asset('css/Publicar_Emprendimiento1.css') }}">
</head>
<body>
  
    <br><br>
    <h1>¡Vamos a crear tu emprendimiento!</h1>
<!--linea 1 2 3 4 -->
<div class="navigation">
    <div class="page active">1</div>
    <div class="line"></div>
    <div class="page">2</div>
    <div class="line"></div>
    <div class="page">3</div>
    
</div>
<!-- fin linea 1 2 3 4 -->

<div class="container">
    <h2>Registro de Emprendimiento</h2>
    <form>
        <div class="form-sections">
            <div class="form-section">
                <div class="form-group">
                    <label for="nombre_emprendimiento">Nombre del Emprendimiento</label>
                    <input type="text" id="nombre_emprendimiento" name="nombre_emprendimiento" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Escribe tu eslogan</label>
                    <textarea id="descripcion" name="descripcion" required></textarea>
                </div>
                <div class="form-group">
                    <label for="especificaciones">Especificaciones</label>
                    <textarea id="especificaciones" name="especificaciones"></textarea>
                </div>
            </div>
            <div class="form-section">
                <div class="form-group">
                    <label for="categoria">Categoría</label>
                    <select id="categoria" name="categoria" required>
                        <option value="">Seleccione una categoría</option>
                        <option value="tecnologia">Articulos deportivos</option>
                        <option value="servicios">Articulos para el hogar</option>
                        <option value="comercio">Electrónica</option>
                        <option value="comercio">Indumentaria</option>
                        <option value="comercio">Instrumentos musicales</option>
                        <option value="comercio">Productos de mascotas</option>
                        <option value="comercio">Suministros de oficina</option>
                        <option value="comercio">Artesanías</option>
                        <option value="comercio">Herramientas de trabajo</option>
                        <option value="comercio">Educación</option>
                        <option value="comercio">Alimentación</option>
                        <option value="comercio">vehiculos</option>
                        <!-- Añada más opciones según sea necesario -->
                    </select>
                </div>
            </div>
        </div>
    </form>
    <a href="{{ route('Publicar_Emprendimiento2') }}" class="btn-publicar">Siguiente</a>
</div>
    





 
    
</body>
</html>