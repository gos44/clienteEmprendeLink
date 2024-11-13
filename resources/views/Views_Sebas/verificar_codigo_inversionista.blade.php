<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambio Contraseña Usuario</title>

    <link rel="stylesheet" href="{{ asset('css/verificar_codigo_usuario.css') }}">


</head>
<body>
    <form class="form">
        <div class="flex-column">
           <h2>Verificar codigo</h2>
           <h4>Se a enviado un codigo de seguridad  a su correo /o/ numero de telefono para confirmar su indetidad.</h4>
        </div>
        <div>
          <label>Digite el codigo</label>
          <div class="inputForm">
              <input type="email" class="input" placeholder="Ingrese su correo electrónico" id="email" />
          </div>
      </div>



      <div class="flex-row">
        <span class="span"><a href="{{ route('verificar_identidad_inversionista') }}" class="link">No e recibido ningun codigo</a></span>
      </div>
      <a href="{{ route('cambiar_contraseña_inversionista') }}" class="button-submit">Enviar</a>

      <p class="p">¿Ya tienes una cuenta? <a href="{{ route('iniciar_sesion_inversionista') }}" class="span">Iniciar sesión</a></p>
    </form>
</body>
</html>
