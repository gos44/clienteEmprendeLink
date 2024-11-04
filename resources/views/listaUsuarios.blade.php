<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario - Emprende Link</title>
    <link rel="icon" href="img/logoCuadrado.png" type="image/png">
    <link rel="stylesheet" href="cssgos/listaUsuarios.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

<div id="header">
{{-- // include 'navbarUsuario.html';  --}}
</div>

<main>
    <section class="notifications">
        <div class="search-bar">
            <input type="text" id="searchInput" placeholder="Buscar...">
            <button type="submit"><i class="fas fa-search"></i></button>
        </div>

        <?php
        // Ejemplo de array con información de usuarios
        $usuarios = [
            ['img' => 'images/perfilusu1.png', 'nombre' => 'Miguel Angel Bonilla', 'correo' => 'miguel@example.com', 'ubicacion' => 'Popayán, Colombia', 'link' => 'usaurioPerfil-emprededor.html'],
            ['img' => 'images/perfilusu2.png', 'nombre' => 'Kevin Alexis Ortiz', 'correo' => 'kevin@example.com', 'ubicacion' => 'Medellín, Colombia'],
            ['img' => 'images/perfilusu3.png', 'nombre' => 'Cristian Sebastian Delgado', 'correo' => 'cristian@example.com', 'ubicacion' => 'Cali, Colombia'],
            // Añadir más usuarios según sea necesario
        ];

        foreach ($usuarios as $usuario) {
            echo "<div class='notification'>";
            echo "<img src='{$usuario['img']}' alt='Usuario'>";
            echo "<div class='notification-content'>";
            echo "<h3><a href='{$usuario['link']}'>{$usuario['nombre']}</a></h3>";
            echo "<p><strong>Correo:</strong> {$usuario['correo']}</p>";
            echo "<p><strong>Ubicación:</strong> {$usuario['ubicacion']}</p>";
            echo "</div>";
            echo "<a href='CHAT-EMPRENDEDOR.HTML'><button class='send-message'><i class='fas fa-envelope'></i> Enviar mensaje</button></a>";
            echo "</div>";
        }
        ?>
    </section>
</main>

<div id="footer">
    {{--  include 'FOOTER-USUARIO.HTML';  --}}
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

<script>
// filtro buscar
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const contactsList = document.querySelector('.notifications');
    const contacts = contactsList.querySelectorAll('.notification');

    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();

        contacts.forEach(contact => {
            const name = contact.querySelector('h3').textContent.toLowerCase();
            const message = contact.querySelector('p').textContent.toLowerCase();

            if (name.includes(searchTerm) || message.includes(searchTerm)) {
                contact.style.display = '';
            } else {
                contact.style.display = 'none';
            }
        });
    });
});
</script>

</body>
</html>
