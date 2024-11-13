<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambio Contraseña Usuario</title>


    <link rel="stylesheet" href="{{ asset('css/cambiar_contraseñas_nuevas.css') }}">

</head>
<body>
    <form class="form">
        <div class="flex-column">
           <h2>Cambiar Contraseña</h2>
           <h4>¡La verificación de identidad se ha realizado exitosamente!</h4>
        </div>
        <div>
          <label>Por favor ingrese su nueva contraseña</label>
          <div class="inputForm">
              <input type="password" class="input" placeholder="Ingrese su nueva contraseña" id="newPassword" />
              <svg height="20" viewBox="0 0 24 24" width="20" xmlns="http://www.w3.org/2000/svg" id="toggleNewPassword">
                  <path d="M12 4.5c-5 0-9.27 3.11-11 7.5 1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zm0 13c-3.59 0-6.79-2.14-8.43-5.5 1.64-3.36 4.84-5.5 8.43-5.5s6.79 2.14 8.43 5.5c-1.64 3.36-4.84 5.5-8.43 5.5zm0-9a3.5 3.5 0 1 0 3.5 3.5 3.5 3.5 0 0 0 -3.5-3.5zm0 5a1.5 1.5 0 1 1 1.5-1.5 1.5 1.5 0 0 1 -1.5 1.5z"></path>
              </svg>
          </div>
      </div>

      <div>
          <label>Confirmación de contraseña</label>
          <div class="inputForm">
              <input type="password" class="input" placeholder="Confirme su contraseña" id="confirmPassword" />
              <svg height="20" viewBox="0 0 24 24" width="20" xmlns="http://www.w3.org/2000/svg" id="toggleConfirmPassword">
                  <path d="M12 4.5c-5 0-9.27 3.11-11 7.5 1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zm0 13c-3.59 0-6.79-2.14-8.43-5.5 1.64-3.36 4.84-5.5 8.43-5.5s6.79 2.14 8.43 5.5c-1.64 3.36-4.84 5.5-8.43 5.5zm0-9a3.5 3.5 0 1 0 3.5 3.5 3.5 3.5 0 0 0 -3.5-3.5zm0 5a1.5 1.5 0 1 1 1.5-1.5 1.5 1.5 0 0 1 -1.5 1.5z"></path>
              </svg>
          </div>
      </div>

      <div class="flex-row">
        <span class="span"><a href="contactanosayuda.html" class="link">¿Necesitas ayuda?</a></span>
      </div>
      <a href="{{ route('iniciar_sesion_usuario') }}" class="button-submit">Enviar</a>


      <p class="p">¿Ya tienes una cuenta? <a href="{{ route('iniciar_sesion_usuario') }}" class="span">Iniciar sesión</a></p>
    </form>
</body>
</html>
