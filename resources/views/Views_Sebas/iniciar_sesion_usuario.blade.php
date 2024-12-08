<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="{{ asset('css/inicio_de_sesion.css') }}">

</head>
<body>
    <!-- Logo con enlace -->
    <a href="logo">
        <img src="images/logo.png" alt="Logo" class="logo">
    </a>

    <!-- Formulario de inicio de sesión -->
    <form class="form" action="{{ route('iniciar_sesion_usuario.login') }}" method="POST">
        @csrf <!-- Token de seguridad para Laravel -->
        <div class="flex-column">
            <label>Iniciar Sesión</label>
        </div>

        @if ($errors->any())
            <div style="color: red; margin-bottom: 15px;">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <div class="inputForm">
            <input type="email" class="input" name="email" placeholder="Ingrese su correo electrónico" required />
        </div>

        <div class="flex-column">
            <label>Contraseña</label>
        </div>
        <div class="inputForm">
            <input type="password" class="input" name="password" placeholder="Ingrese su contraseña" required />
        </div>

        <label>Seleccione su Rol</label>

        <select name="role" class="rol-selector" required>
            <option value="">Seleccione su rol</option>
            <option value="entrepreneur">Emprendedor</option>
            <option value="investor">Inversor</option>
        </select>

        <button type="submit" class="button-submit">Iniciar sesión</button>

        <p class="p">¿No tienes una cuenta? <a href="{{ route('registrar_nuevo_usuario.store') }}" class="span">Regístrate</a></p>
    </form>

    <script>
        // Lista de imágenes de fondo
        const backgrounds = [
            'images/fondologin1.jpeg', // Asegúrate de usar las rutas correctas
            'images/fondologin2.jpeg',
            'images/fondologin3.jpeg',

        ];

        let currentIndex = 0;

        // Función para cambiar la imagen de fondo
        function changeBackground() {
            document.body.style.backgroundImage = `url(${backgrounds[currentIndex]})`;
            currentIndex = (currentIndex + 1) % backgrounds.length; // Cambia la imagen al siguiente índice
        }

        // Cambiar fondo cada 5 segundos
        setInterval(changeBackground, 5000);

        // Establecer fondo inicial
        changeBackground();
    </script>
</body>
</html>
