<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="{{ asset('css/inicio_de_sesion.css') }}">
</head>
<body>
    <form class="form" action="{{ route('iniciar_sesion_usuario.login') }}" method="POST">
        @csrf <!-- Token de seguridad para Laravel -->
        <div class="flex-column">
            <label>Iniciar Sesión</label>
        </div>
        <div class="inputForm">
            <input type="email" class="input" name="email" placeholder="Ingrese su correo electrónico" required />
        </div>
        <div class="flex-column">
            <label>Contraseña</label>
        </div>
        <div class="inputForm">
            <input type="password" class="input" name="password" placeholder="Ingrese su contraseña" required />
        </div>
        <div class="flex-row">
            <a class="span" href="{{ route('verificar_identidad_usuario') }}">¿Olvidaste tu contraseña?</a>
        </div>
        <button type="submit" class="button-submit">Iniciar sesión</button>
        <p class="p">¿No tienes una cuenta? <a href="{{ route('registrar_nuevo_usuario') }}" class="span">Regístrate</a></p>
    </form>

    @if ($errors->has('loginError'))
        <p style="color: red;">{{ $errors->first('loginError') }}</p>
    @endif
</body>
</html>
