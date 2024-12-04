<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="{{ asset('css/inicio_de_sesion.css') }}">
    <style>
        .rol-selector {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <form id="login-form" class="form" method="POST" action="{{ route('iniciar_sesion_usuario.login') }}">
        @csrf
        <div class="flex-column">
            <label>Iniciar Sesión</label>
        </div>

        <div class="inputForm">
            <input type="email" id="email" name="email" class="input" placeholder="Ingrese su correo electrónico" required />
        </div>

        <div class="flex-column">
            <label>Contraseña</label>
        </div>
        <div class="inputForm">
            <input type="password" id="password" name="password" class="input" placeholder="Ingrese su contraseña" required />
        </div>

        <div class="flex-column">
            <label>Seleccione su Rol</label>
        </div>
        <div class="inputForm">
            <select id="role" name="role" class="rol-selector" required>
                <option value="">Seleccione su rol</option>
                <option value="entrepreneur">Emprendedor</option>
                <option value="investor">Inversor</option>
            </select>
        </div>

        <div id="error-message" style="color: red; margin-bottom: 15px;">
            @if($errors->any())
                <p>{{ $errors->first() }}</p>
            @endif
        </div>

        <button type="submit" class="button-submit">Iniciar sesión</button>

        <p class="p">¿No tienes una cuenta? <a href="{{ route('registrar_nuevo_usuario.store') }}" class="span">Regístrate</a></p>
    </form>

    <script>
        document.getElementById('login-form').addEventListener('submit', async function(event) {
            event.preventDefault();

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const role = document.getElementById('role').value;
            const errorMessage = document.getElementById('error-message');

            try {
                const response = await fetch("{{ route('iniciar_sesion_usuario.login') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ email, password, role })
                });

                const data = await response.json();

                if (response.ok && data.token) {
                    // Guardar el token en localStorage
                    localStorage.setItem('auth_token', data.token);
                    alert('Inicio de sesión exitoso');
                    // Redirigir según el rol
                    if (role === 'entrepreneur') {
                        window.location.href = "{{ route('Home_Usuario.index') }}";
                    } else if (role === 'investor') {
                        window.location.href = "{{ route('Home_inversor.index') }}";
                    }
                } else {
                    // Mostrar error
                    errorMessage.textContent = data.message || 'Error al iniciar sesión. Por favor, verifica tus datos.';
                }
            } catch (error) {
                console.error('Error en el inicio de sesión:', error);
                errorMessage.textContent = 'Ocurrió un error inesperado. Inténtalo de nuevo.';
            }
        });
    </script>
</body>
</html>
