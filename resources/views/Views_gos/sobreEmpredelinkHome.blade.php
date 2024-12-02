@extends('layouts.Footer_Home')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emprende Link</title>
    <link rel="stylesheet" href="{{ asset('css/acuerdosyterminosInversor.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
  <header>
    <div class="header-left">
        <a href="{{ route('Home1.index') }}">
        <img src="link/16.png" alt="Emprende Link" width="200px" >
    </a>
    </div>
    <div class="header-right">
    <a href="acuerdosyterminos.html"><i class="fas fa-question-circle"></i> Ayuda</a>
    <a href="registro_usuario.html" id="registroBtn">Registrarse</a>
    <a href="iniciosesion1_usuario.html"><i class="fas fa-user"></i> Iniciar sesión</a>

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
</header>

<aside class="sidebar">
    <div class="profile">
        <img src="link/15.png" alt="User">
        <br>
        <span>Dayron Camilo</span>
        <br>
        <a href="mailto:esdp@gmail.com">esdp@gmail.com</a>
    </div>
    <ul>
        
      <li><a href="perfilInversor.html">Perfil</a></li>
      <li><a href="busqueda_filtro_inver.html">Busqueda por categoría</a></li>
      <li><a href="ListaInversionista.html">Consultar Lista</a></li>
      <li><a href="CHAT-INVERSIONISTA.HTML">Chat</a></li>
      <li><a href="index.html">Cerrar Sesión</a></li>
    </ul>
</aside>
<div class="container">
    <div class="cont">
        <h1>EmprendeLink: Conectando Emprendedores e Inversionistas</h1>
        <p>En el dinámico mundo del emprendimiento, donde la innovación y la inversión se encuentran en una encrucijada, surge EmprendeLink, una red social dedicada a crear un puente entre emprendedores visionarios e inversionistas potenciales. Esta plataforma no solo busca fomentar la colaboración y el crecimiento de nuevas ideas, sino también fortalecer el ecosistema emprendedor a nivel global.</p>
        
      <br>  <h2>Misión y Visión</h2>
      <br>
        <p><strong>Misión:</strong> EmprendeLink tiene como misión facilitar las conexiones estratégicas entre emprendedores y capital, proporcionando una plataforma donde las ideas puedan florecer y encontrar el respaldo financiero necesario para su realización.</p>
        <p><strong>Visión:</strong> Convertirse en la red social líder para emprendedores e inversionistas, reconocida por su capacidad de transformar ideas innovadoras en realidades comerciales exitosas.</p>
        
        <br><h2>Funcionalidades Clave</h2><br>
        <p><strong>1. Perfiles de Emprendedores e Inversionistas:</strong></p>
        <ul>
            <li><strong>Emprendedores:</strong> Pueden crear perfiles detallados que incluyan sus proyectos, experiencias y necesidades de financiamiento. Esto les permite mostrar sus ideas a posibles inversionistas.</li>
            <li><strong>Inversionistas:</strong> Tienen la capacidad de explorar perfiles de emprendedores, acceder a detalles de proyectos y evaluar oportunidades de inversión.</li>
        </ul>
        
        <p><strong>2. Herramientas de Networking:</strong></p>
        <ul>
            <li><strong>Mensajería Directa:</strong> Facilita la comunicación entre emprendedores e inversionistas, permitiendo discusiones directas sobre proyectos y posibles colaboraciones.</li>
            <li><strong>Foros y Grupos:</strong> Espacios donde los miembros pueden discutir tendencias del mercado, compartir conocimientos y buscar consejos de la comunidad.</li>
        </ul>
        
        <p><strong>3. Eventos y Webinars:</strong> Organización de eventos en línea y presenciales donde los emprendedores pueden presentar sus ideas a paneles de inversionistas y recibir retroalimentación directa.</p>
        
        <p><strong>4. Recursos Educativos:</strong> Acceso a una biblioteca de artículos, videos y cursos que cubren desde la creación de un pitch efectivo hasta estrategias avanzadas de financiamiento y gestión empresarial.</p>
        
        <p><strong>5. Seguridad y Confidencialidad:</strong> EmprendeLink se compromete a proteger la información de sus usuarios, garantizando que las ideas y proyectos compartidos en la plataforma estén seguros y sean tratados con la máxima confidencialidad.</p>
        
       <br> <h2>Impacto en la Comunidad Emprendedora</h2><br>
        <p>Desde su lanzamiento, EmprendeLink ha tenido un impacto significativo en la comunidad emprendedora. Ha permitido que innumerables ideas innovadoras encuentren el apoyo financiero necesario para despegar. Además, ha creado un entorno donde los emprendedores pueden aprender unos de otros, compartir experiencias y construir redes de apoyo.</p>
        
       <br> <h2>Testimonios</h2><br>
        <p><strong>María García, Fundadora de TechInnovate:</strong> "EmprendeLink ha sido fundamental para encontrar los inversionistas adecuados para mi startup. Gracias a esta plataforma, no solo obtuvimos el financiamiento que necesitábamos, sino que también encontramos mentores valiosos que nos han guiado en nuestro crecimiento."</p>
        <p><strong>Juan Pérez, Inversionista:</strong> "Lo que más me gusta de EmprendeLink es la calidad de los proyectos presentados. Es un lugar donde puedo descubrir ideas frescas y apoyar a emprendedores talentosos que están listos para transformar el mercado."</p>
        
       <br> <h2>Futuro de EmprendeLink</h2><br>
        <p>EmprendeLink está comprometida a evolucionar continuamente para satisfacer las necesidades de su comunidad. Con planes de expandir sus funcionalidades y alcanzar nuevos mercados, la plataforma se posiciona como un socio esencial para cualquier emprendedor o inversionista en busca de oportunidades.</p>
        
        <p>En resumen, EmprendeLink no es solo una red social, sino un ecosistema integral diseñado para catalizar el crecimiento y el éxito de emprendedores e inversionistas por igual. Conectando ideas y capital, EmprendeLink está forjando el futuro del emprendimiento.</p>
    </div>
</div>
  
</body>
</html>
