@extends('layouts.Nav-Bar_Usuario')
@extends('layouts.Footer_Usuario')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario - Emprende Link</title>
    <link rel="stylesheet" href="http://localHost/clienteEmprendeLink/resources/css/listaUsuarios.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <main>
        <section class="notifications">
            <div class="search-bar">
              <input type="text" id="searchInput" placeholder="Buscar...">
                <button type="submit"><i class="fas fa-search"></i></button>
            </div>
            <div class="notification">
                <img src="images/perfilusu1.png" alt="LEGO">
                <div class="notification-content">
                  <h3><a href="{{ route('VerUser.index') }}">Miguel Angel Bonilla</a></h3>
                  <p><strong>Correo:</strong> miguel@example.com</p>
                  <p><strong>Ubicación:</strong> Popayán, Colombia</p>
                </div>
               <a href="{{ route('Chat_Usuario.index') }}"> <button class="send-message"><i class="fas fa-envelope"></i> Enviar mensaje</button></a>
            </div>
            <div class="notification">  
                <img src="images/perfilusu2.png" alt="FANTA">
                <div class="notification-content">
                    <h3>Kevin alexis ortiz</h3>
                    <p><strong>Correo:</strong> kevin@example.com</p>
                    <p><strong>Ubicación:</strong> Medellín, Colombia</p>
                </div>
                <a href="{{ route('Chat_Usuario.index') }}"> <button class="send-message"><i class="fas fa-envelope"></i> Enviar mensaje</button></a>
            </div>
            <div class="notification">
                <img src="images/perfilusu3.png" alt="Sprite">
                <div class="notification-content">
                    <h3>Cristian sebastian delgado</h3>
                    <p><strong>Correo:</strong> cristian@example.com</p>
                    <p><strong>Ubicación:</strong> Cali, Colombia</p>
                </div>
                <a href="{{ route('Chat_Usuario.index') }}"> <button class="send-message"><i class="fas fa-envelope"></i> Enviar mensaje</button></a>
            </div>
            <div class="notification">
                <img src="images/perfilusu4.png" alt="Senaworks">
                <div class="notification-content">
                    <h3> Dayron Hernandez</h3>
                    <p><strong>Correo:</strong> hernandez@example.com</p>
                    <p><strong>Ubicación:</strong> Barranquilla, Colombia</p>
                </div>
                <a href="{{ route('Chat_Usuario.index') }}"> <button class="send-message"><i class="fas fa-envelope"></i> Enviar mensaje</button></a>
            </div>
        </section>
      </main>
      <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('searchInput');
            const notificationsList = document.querySelector('.notifications');
            const notifications = notificationsList.querySelectorAll('.notification');
    
            searchInput.addEventListener('input', function () {
                const searchTerm = this.value.toLowerCase();
    
                notifications.forEach(notification => {
                    const name = notification.querySelector('h3').textContent.toLowerCase();
                    const messages = Array.from(notification.querySelectorAll('p')).map(p => p.textContent.toLowerCase());
                    
                    // Combinar nombre y mensajes para la búsqueda
                    const fullContent = [name, ...messages].join(' ');
    
                    if (fullContent.includes(searchTerm)) {
                        notification.style.display = '';
                    } else {
                        notification.style.display = 'none';
                    }
                });
            });
        });
    </script>
</body>
</html>
