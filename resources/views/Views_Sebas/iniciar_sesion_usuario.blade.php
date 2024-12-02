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
        /* Ajustes específicos para el selector de rol */
        .rol-selector {
            width: 100%; /* Se asegura de que el selector ocupe todo el ancho disponible */
            padding: 12px; /* Un poco más de espacio para que se vea más cómodo */
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px; /* Ajuste en el tamaño de la fuente */
            background-color: #fff; /* Fondo blanco para que se vea limpio */
        }

        /* Enfocar el selector de rol */
        .rol-selector:focus {
            border-color: #5cb85c; /* Cambio de color al hacer foco */
            outline: none;
            background-color: #f9f9f9; /* Fondo suave cuando está en foco */
        }
    </style>
</head>
<body>
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

        <div class="flex-column">
            <label>Seleccione su Rol</label>
        </div>
        <div class="inputForm">
            <select name="role" class="rol-selector" required>
                <option value="">Seleccione su rol</option>
                <option value="entrepreneur">Emprendedor</option>
                <option value="investor">Inversor</option>
            </select>
        </div>

        <div class="flex-row">
            <a class="span" href="{{ route('verificar_identidad_usuario') }}">¿Olvidaste tu contraseña?</a>
        </div>

        <button type="submit" class="button-submit">Iniciar sesión</button>

        <p class="p">¿No tienes una cuenta? <a href="{{ route('registrar_nuevo_usuario') }}" class="span">Regístrate</a></p>
    </form>
</body>
</html>
