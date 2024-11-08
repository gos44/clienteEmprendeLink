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
           <h2>VERIFICACION</h2>
           <h4>Para  verificar tu identidad te enviaremos un codigo de 6 dijitos, por favor ingrese su direccion de correo electronico o numero telefonico</h4>
        </div>
        <div>
          <label>Correo Electrónico</label>
          <div class="inputForm">
              <input type="email" class="input" placeholder="Ingrese su correo electrónico" id="email" />
          </div>
      </div>

      <div>
          <label>Número de celular</label>
          <div class="inputForm">
              <input type="text" class="input" placeholder="Ingrese su número de celular" id="phone" />
          </div>
      </div>

      <div class="flex-row">
        <span class="span"><a href="contactanosayuda.html" class="link">¿Necesitas ayuda?</a></span>
      </div>
      <a href="verificar_codigo_inversionista.html" class="button-submit">Enviar</a>

      <p class="p">¿Ya tienes una cuenta? <a href="inicio_sesion_inver.html" class="span">Iniciar sesión</a></p>
    </form>
</body>
</html>
