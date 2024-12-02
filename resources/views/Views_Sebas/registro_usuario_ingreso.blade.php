<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="{{ asset('css/registro_usuario_ingreso.css') }}">

</head>
<body>
    <form class="form">
        <div class="flex-column">



            <label>Ingrese su usuario</label>
        </div>
        <div class="inputForm">
            <svg height="20" viewBox="0 0 32 32" width="20" xmlns="http://www.w3.org/2000/svg">
                <g id="Layer_3" data-name="Layer 3">
                </g>
            </svg>
            <input type="text" class="input" placeholder="Ingrese su usuario" />
        </div>
        <div class="flex-column">


            <label>Dijite su contraseña</label>
        </div>
        <div class="inputForm">
            <svg height="20" viewBox="0 0 32 32" width="20" xmlns="http://www.w3.org/2000/svg">
                <g id="Layer_3" data-name="Layer 3">
                </g>
            </svg>
            <input type="text" class="input" placeholder="Ingrese su contraseña" />
        </div>
        <div class="flex-column">
            <label>Confirmar contraseña</label>
        </div>
        <div class="inputForm">
            <svg height="20" viewBox="0 0 32 32" width="20" xmlns="http://www.w3.org/2000/svg">
                <g id="Layer_3" data-name="Layer 3">
                </g>
            </svg>
            <input type="text" class="input" placeholder="Ingrese su contraseña" />
        </div>
        <div class="flex-row">
            <span class="span"><a href="{{ route('ContactanosHome') }}" class="link">¿Necesitas ayuda?</a></span>
        </div>
        <a href="{{ route('iniciar_sesion_usuario.login') }}" class="button-submit">Registrarse</a>
        <p class="p">¿Ya tienes una cuenta? <a href="{{ route('iniciar_sesion_usuario.login') }}" class="span">Iniciar sesion</a></p>


    </script>

</body>

</html>
