<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Iniciar Sesión</title>
</head>
<body>
    <form id="login-form">
        <label>Correo electrónico:</label>
        <input type="email" id="email" required>

        <label>Contraseña:</label>
        <input type="password" id="password" required>

        <label>Rol:</label>
        <select id="role" required>
            <option value="entrepreneur">Emprendedor</option>
            <option value="investor">Inversor</option>
        </select>

        <button type="submit">Iniciar sesión</button>
    </form>

    <div id="message"></div>

    <script>
        document.getElementById('login-form').addEventListener('submit', async function(event) {
            event.preventDefault();

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const role = document.getElementById('role').value;
            const messageDiv = document.getElementById('message');

            try {
                const response = await fetch("{{ route('iniciar_sesion_usuario.login') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ email, password, role })
                });

                const data = await response.json();

                if (response.ok) {
                    // Si la respuesta es correcta y contiene el token
                    localStorage.setItem('auth_token', data.token);
                    messageDiv.innerHTML = 'Inicio de sesión exitoso. Token: ' + data.token;
                } else {
                    messageDiv.innerHTML = 'Error: ' + data.message;
                }
            } catch (error) {
                messageDiv.innerHTML = 'Ocurrió un error al intentar iniciar sesión. Intenta de nuevo.';
            }
        });
    </script>
</body>
</html>
