<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/registro_usuario.css') }}">

    <title>Registro Usuario</title>
</head>
<body>
    <form class="form" action="{{ route('registrar_nuevo_usuario.store') }}" method="POST" enctype="multipart/form-data">
        @csrf <!-- Token de seguridad para Laravel -->

        <div class="flex-column">
            <label class="form-title">Registro Usuario</label>
        </div>

        <div class="form-grid">
            <!-- Columna Izquierda -->
            <div class="form-column">
                <div class="flex-column">
                    <label>Nombre</label>
                    <div class="inputForm">
                        <input type="text" class="input" name="name" placeholder="Ingrese su nombre" required />
                    </div>
                </div>

                <div class="flex-column">
                    <label>Apellido</label>
                    <div class="inputForm">
                        <input type="text" class="input" name="lastname" placeholder="Ingrese su apellido" required />
                    </div>
                </div>

                <div class="flex-column">
                    <label>Correo electrónico</label>
                    <div class="inputForm">
                        <input type="email" class="input" name="email" id="emailInput" placeholder="Ingrese su correo electrónico" required />
                    </div>
                    <p id="errorMessage" style="color:red; display:none;">Por favor, ingrese un correo electrónico válido que contenga un '@'</p>
                </div>

                <div class="flex-column">
                    <label>Teléfono</label>
                    <div class="inputForm">
                        <input type="text" class="input" name="phone" placeholder="Ingrese su número de teléfono" required />
                    </div>
                </div>

                <div class="flex-column">
                    <label>Fecha de nacimiento</label>
                    <div class="inputForm">
                        <input type="date" class="input" name="birth_date" required />
                    </div>
                </div>
            </div>

            <!-- Columna Derecha -->
            <div class="form-column">
                <div class="flex-column">
                    <label>Ubicación</label>
                    <div class="inputForm">
                        <input type="text" class="input" name="location" placeholder="Ingrese su ubicación" required />
                    </div>
                </div>

                <div class="flex-column">
                    <label>Número</label>
                    <div class="inputForm">
                        <input type="text" class="input" name="number" placeholder="Ingrese su número" required />
                    </div>
                </div>

                <div class="flex-column">
                    <label>Contraseña</label>
                    <div class="inputForm">
                        <input type="password" class="input" name="password" placeholder="Ingrese su contraseña" required />
                    </div>
                </div>

                <div class="flex-column">
                    <label>Confirmar contraseña</label>
                    <div class="inputForm">
                        <input type="password" class="input" name="password_confirmation" placeholder="Confirme su contraseña" required />
                    </div>
                </div>

                <div class="flex-column">
                    <label>Imagen</label>
                    <div class="inputForm">
                        <input type="file" class="input" name="pic_profile" accept="image/*" />
                    </div>
                </div>
            </div>
        </div>

        <div class="flex-row">
            <span class="span"><a href="{{ route('ContactanosHome') }}" class="link">¿Necesitas ayuda?</a></span>
        </div>

        <button type="submit" class="button-submit">Registrarse</button>

        <p class="p">¿Ya tienes una cuenta? <a href="{{ route('iniciar_sesion_usuario') }}" class="span">Iniciar sesión</a></p>
    </form>

    <script>
        // Script para el email
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
</body>
</html>
