<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="{{ asset('css/registro_usuario.css') }}">

</head>

<body>
    <form class="form">
        <div class="flex-column">
            <label>Registro Usuario </label>
        </div>
        Nombre
        <div class="inputForm">
            <svg height="20" viewBox="0 0 32 32" width="20" xmlns="http://www.w3.org/2000/svg">
                <g id="Layer_3" data-name="Layer 3">
                </g>
            </svg>
            <input type="text" class="input" placeholder="Ingrese su Nombre" />
        </div>



            <label>Apellido</label>
        </div>
        <div class="inputForm">
            <svg height="20" viewBox="0 0 32 32" width="20" xmlns="http://www.w3.org/2000/svg">
                <g id="Layer_3" data-name="Layer 3">
                </g>
            </svg>
            <input type="text" class="input" placeholder="Ingrese su Apellido" />
        </div>



            <label>Documento</label>
        </div>
        <div class="inputForm">
            <svg height="20" viewBox="0 0 32 32" width="20" xmlns="http://www.w3.org/2000/svg">
                <g id="Layer_3" data-name="Layer 3">
                </g>
            </svg>
            <input type="text" class="input" placeholder="Ingrese su Documento" />
        </div>
        <label>Correo electronico o gmail</label>
    </div>
    <div class="inputForm">
        <svg height="20" viewBox="0 0 32 32" width="20" xmlns="http://www.w3.org/2000/svg">
            <g id="Layer_3" data-name="Layer 3">
            </g>
        </svg>
        <input type="text" class="input" id="emailInput" placeholder="Ingrese su correo electronico o gmail" />
    </div>
    <p id="errorMessage" style="color:red; display:none;">Por favor, ingrese un correo electrónico válido que contenga un '@'</p>

    <script>
        const emailInput = document.getElementById('emailInput');
        const errorMessage = document.getElementById('errorMessage');

        emailInput.addEventListener('input', function() {
            if (!emailInput.value.includes('@')) {
                errorMessage.style.display = 'block';
            } else {
                errorMessage.style.display = 'none';
            }
        });
    </script>
            <label>Telefono</label>
        </div>
        <div class="inputForm">
            <svg height="20" viewBox="0 0 32 32" width="20" xmlns="http://www.w3.org/2000/svg">
                <g id="Layer_3" data-name="Layer 3">
                </g>
            </svg>
            <input type="text" class="input" placeholder="Ingrese su Telefono" />
        </div>


        <div class="flex-row">

            <span class="span"><a href="{{ route('ContactanosHome') }}" class="link">¿Necesitas ayuda?</a></span>
        </div>
        <a href="{{ route('registrar_usuario_ingreso') }}" class="button-submit">Registrarse</a>

        <p class="p">¿Ya tienes una cuenta? <a href="{{ route('iniciar_sesion_usuario') }}" class="span">Iniciar sesion</a></p>



    </script>

</body>

</html>
