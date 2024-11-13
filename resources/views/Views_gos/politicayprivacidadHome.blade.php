@extends('layouts.app')
@extends('layouts.Nav-Bar_Usuario')
@extends('layouts.Footer_Usuario')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emprende Link</title>
    <link rel="icon" href="img/logoCuadrado.png" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/acuerdosyterminos.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
        <header>
            <div class="header-left">
                <img src="link/16.png" alt="Emprende Link" width="300px">
            </div>
            <div class="header-right">
            <a href="acuerdosyterminos.html"><i class="fas fa-question-circle"></i> Ayuda</a>
            <a href="registro_usuario.html" id="registroBtn">Registrarse</a>
            <a href="iniciosesion1_usuario.html" id="iniciarSesionBtn"><i class="fas fa-user"></i> Iniciar sesión</a>
        
            <hero17-wrapper class="hero17-wrapper">
                <!--Hero17 component-->
                <div class="hero17-header78">
                  <div
                    class="hero17-column thq-section-max-width thq-section-padding"
                  >
            <!-- Modal para opciones de registro -->
            <div id="registroModal" style="display: none; position: fixed; z-index: 1; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.4);">
                <div style="background-color: #fefefe; margin: 15% auto; padding: 20px; border: 1px solid #888; width: 300px; text-align: center; border-radius: 10px;">
                    <h2 style="margin-bottom: 20px;">Seleccione tipo de registro</h2>
                    <div style="display: flex; justify-content: space-around; margin-bottom: 20px;">
                        <button onclick="window.location.href='registro_usuario.html'" style="background-color: black; color: white; border: none; padding: 10px 15px; cursor: pointer; font-size: 14px; border-radius: 10px;">Usuario</button>
                        <button onclick="window.location.href='registro_inver1.html'" style="background-color: black; color: white; border: none; padding: 10px 15px; cursor: pointer; font-size: 14px; border-radius: 10px;">Inversionista</button>
                    </div>
                    <button id="cerrarRegistroModal" style="color: rgb(0, 0, 0); border: none; padding: 10px 15px; cursor: pointer; font-size: 14px; border-radius: 10px;">Cerrar</button>
                </div>
            </div>
        
            <!-- Modal para opciones de inicio de sesión -->
            <div id="inicioSesionModal" style="display: none; position: fixed; z-index: 1; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.4);">
                <div style="background-color: #fefefe; margin: 15% auto; padding: 20px; border: 1px solid #888; width: 300px; text-align: center; border-radius: 10px;">
                    <h2 style="margin-bottom: 20px;">Seleccione tipo de inicio de sesión</h2>
                    <div style="display: flex; justify-content: space-around; margin-bottom: 20px;">
                        <button onclick="window.location.href='iniciosesion1_usuario.html'" style="background-color: black; color: white; border: none; padding: 10px 15px; cursor: pointer; font-size: 14px; border-radius: 10px;">Usuario</button>
                        <button onclick="window.location.href='inicio_sesion_inver.html'" style="background-color: black; color: white; border: none; padding: 10px 15px; cursor: pointer; font-size: 14px; border-radius: 10px;">Inversionista</button>
                    </div>
                    <button id="cerrarInicioSesionModal" style="color: rgb(0, 0, 0); border: none; padding: 10px 15px; cursor: pointer; font-size: 14px; border-radius: 10px;">Cerrar</button>
                </div>
            </div>
        
            <!-- JavaScript para manejar los modales -->
            
        
        </header>

    <div class="container">
        <div class="cont">
            <h1>Política de Privacidad</h1>
            <p>En Emprende Link, nos comprometemos a proteger su privacidad. Esta política de privacidad explica cómo recopilamos, usamos y protegemos su información personal cuando utiliza nuestro sitio web.</p>
            <h2>Recopilación de Información</h2>
            <p>Recopilamos información de identificación personal, como nombres, direcciones de correo electrónico y otra información relevante que usted nos proporciona voluntariamente al registrarse en nuestro sitio o al participar en nuestras actividades.</p>
            <h2>Uso de la Información</h2>
            <p>Usamos la información recopilada para proporcionar y mejorar nuestros servicios, comunicarnos con usted, y personalizar su experiencia en nuestro sitio web.</p>
            <h2>Protección de la Información</h2>
            <p>Implementamos una variedad de medidas de seguridad para mantener la seguridad de su información personal. Sin embargo, no podemos garantizar la seguridad absoluta de la información transmitida en línea.</p>
            <h2>Compartir Información</h2>
            <p>No vendemos, intercambiamos ni transferimos a terceros su información personal sin su consentimiento, excepto cuando sea necesario para proporcionar nuestros servicios o cumplir con la ley.</p>
            <h2>Cambios en la Política de Privacidad</h2>
            <p>Nos reservamos el derecho de actualizar esta política de privacidad en cualquier momento. Le notificaremos sobre cualquier cambio publicando la nueva política en nuestro sitio web.</p>
            <p>Si tiene alguna pregunta sobre nuestra política de privacidad, por favor contáctenos a través del correo electrónico emprendelink234@gmail.com</p>
        </div>
    </div>
    

</body>
</html>
