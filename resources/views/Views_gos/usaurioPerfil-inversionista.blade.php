@extends('layouts.Nav-Bar_Inversionista')
@extends('layouts.Footer_Inversor')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario - Emprende Link</title>
    <link rel="stylesheet" href="http://localHost/clienteEmprendeLink/resources/css/usurioPerfil.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

  
    
    <div class="form-container">
        <h2>Información</h2>
        <img class="userPerfil" src="images/perfilusu1.png" alt="User">
        <form>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="Kevin Alexis Ortiz" readonly>

            <label for="correo">Correo:</label>
            <input type="email" id="correo" name="correo" value="sdp402@gmail.com" readonly>

            <label for="celular">Celular:</label>
            <input type="tel" id="celular" name="celular" value="3214567890" readonly>

            <label for="ubicacion">Ubicación:</label>
            <input type="text" id="ubicacion" name="ubicacion" value="Popayán-Cauca-Colombia" readonly>

            <label for="genero">Género:</label>
            <input type="text" id="genero" name="genero" value="Masculino" readonly>

            <label for="etapa">Etapa:</label>
            <input type="text" id="etapa" name="etapa" value="Primera fase: la idea de negocio" readonly>
        </form>
    </div>

    <div>
        <div class="latest-posts">
            <div class="wine-post">
                <div class="wine-post-header">
                    <img src="LINK/FONDO-VINOS.png" alt="Fondo de vino" class="background-img">
                    <img src="LINK/LOGO-VINOS.png" alt="Mercado de Vinos" class="logo-img">
                </div>
                <div class="wine-post-content">
                    <h3>VINO EL EXTASIS</h3>
                    <p class="quote">"AQUEL QUE VINO AL MUNDO Y NO TOMA VINO, ¿ENTONCES A QUÉ VINO?"</p>
                    <p class="description">Experimenta la magia del vino: Un viaje sensorial único. Más que una bebida, una pasión: Embárcate en un viaje sensorial sin igual donde cada gota te invita a descubrir un universo de sabores, aromas y tradición.</p>
                    <a href="VISITAR-EMPRENDIMIENTO-usuario.HTML" class="btn">Más Información...</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
