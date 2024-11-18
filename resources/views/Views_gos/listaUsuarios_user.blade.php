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
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<main>
    <section class="notifications">
        <div class="search-bar">
            <input type="text" id="searchInput" placeholder="Buscar...">
            <button type="submit"><i class="fas fa-search"></i></button>
        </div>
        
        <?php
        // Ejemplo de datos de notificación
        $notifications = [
            ["img" => "images/perfilusu1.png", "name" => "Miguel Angel Bonilla", "email" => "miguel@example.com", "location" => "Popayán, Colombia"],
            ["img" => "images/perfilusu2.png", "name" => "Kevin Alexis Ortiz", "email" => "kevin@example.com", "location" => "Medellín, Colombia"],
            // Agrega más notificaciones aquí
        ];

        // Generar cada notificación
        foreach ($notifications as $notification) {
            echo '
            <div class="notification">
                <img src="' . $notification["img"] . '" alt="' . $notification["name"] . '">
                <div class="notification-content">
                    <h3>' . $notification["name"] . '</h3>
                    <p><strong>Correo:</strong> ' . $notification["email"] . '</p>
                    <p><strong>Ubicación:</strong> ' . $notification["location"] . '</p>
                </div>
                <a href="CHAT-EMPRENDEDOR.HTML">
                    <button class="send-message"><i class="fas fa-envelope"></i> Enviar mensaje</button>
                </a>
            </div>';
        }
        ?>
        
    </section>
</main>

</body>
</html>
