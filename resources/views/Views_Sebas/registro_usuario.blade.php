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

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

        <div class="flex-column">
            <label class="form-title">Registro Usuario</label>
        </div>

        <div class="form-grid">
            <!-- Columna Izquierda -->
            <div class="form-column">
                <div class="flex-column">
                    <label for="name">Nombre</label>
                    <div class="inputForm">
                        <input type="text" class="input" name="name" id="name" placeholder="Ingrese su nombre" required />
                    </div>
                </div>

                <div class="flex-column">
                    <label for="lastname">Apellido</label>
                    <div class="inputForm">
                        <input type="text" class="input" name="lastname" id="lastname" placeholder="Ingrese su apellido" required />
                    </div>
                </div>

                <div class="flex-column">
                    <label for="email">Correo electrónico</label>
                    <div class="inputForm">
                        <input type="email" class="input" name="email" id="email" placeholder="Ingrese su correo electrónico" required />
                    </div>
                    <p id="errorMessage" style="color:red; display:none;">Por favor, ingrese un correo electrónico válido que contenga un '@'</p>
                </div>

                <div class="flex-column">
                    <label for="phone">Teléfono</label>
                    <div class="inputForm">
                        <input type="text" class="input" name="phone" id="phone" placeholder="Ingrese su número de teléfono" required />
                    </div>
                </div>

                <div class="flex-column">
                    <label for="birth_date">Fecha de nacimiento</label>
                    <div class="inputForm">
                        <input type="date" class="input" name="birth_date" id="birth_date" required />
                    </div>
                </div>
            </div>

            <!-- Columna Derecha -->
            <div class="form-column">
                <div class="flex-column">
                    <label for="location">Ubicación</label>
                    <div class="inputForm">
                        <input type="text" class="input" name="location" id="location" placeholder="Ingrese su ubicación" required />
                    </div>
                </div>

                <div class="flex-column">
                    <label for="number">Documento</label>
                    <div class="inputForm">
                        <input type="text" class="input" name="number" id="number" placeholder="Ingrese su número" required />
                    </div>
                </div>

                <div class="flex-column">
                    <label for="password">Contraseña</label>
                    <div class="inputForm">
                        <input type="password" class="input" name="password" id="password" placeholder="Ingrese su contraseña" required />
                    </div>
                </div>

                <div class="flex-column">
                    <label for="password_confirmation">Confirmar contraseña</label>
                    <div class="inputForm">
                        <input type="password" class="input" name="password_confirmation" id="password_confirmation" placeholder="Confirme su contraseña" required />
                    </div>
                </div>



                <div class="flex-column">
                    <label for="image">Imagen de perfil</label>
                    <input type="file" class="input" name="image" id="image" accept="image/*" required>
                </div>



                <div class="flex-column">
                    <label for="role">Rol</label>
                    <div class="inputForm">
                        <select name="role" id="role" class="input" required>
                            <option value="entrepreneur">Emprendedor</option>
                            <option value="investor">Inversionista</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex-row">
            <span class="span"><a href="{{ route('ContactanosHome') }}" class="link">¿Necesitas ayuda?</a></span>
        </div>

        <button type="submit" class="button-submit">Registrarse</button>

        <p class="p">¿Ya tienes una cuenta? <a href="{{ route('iniciar_sesion_usuario.login') }}" class="span">Iniciar sesión</a></p>
    </form>

    <script>
        // Script para validación de email
        const emailInput = document.getElementById('email');
        const errorMessage = document.getElementById('errorMessage');

        emailInput.addEventListener('input', function() {
            if (!emailInput.value.includes('@')) {
                errorMessage.style.display = 'block';
            } else {
                errorMessage.style.display = 'none';
            }
        });

        // Validación adicional si es necesario
        document.querySelector('form').addEventListener('submit', function(event) {
            // Validación de campos requeridos
            const requiredFields = document.querySelectorAll('input[required], select[required]');
            for (let field of requiredFields) {
                if (!field.value) {
                    event.preventDefault();
                    alert('Por favor, complete todos los campos requeridos.');
                    return;
                }
            }
        });


         // Validación adicional si es necesario
    document.querySelector('form').addEventListener('submit', function(event) {
        // Validación de campos requeridos
        const requiredFields = document.querySelectorAll('input[required], select[required]');
        for (let field of requiredFields) {
            if (!field.value) {
                event.preventDefault();
                alert('Por favor, complete todos los campos requeridos.');
                return;
            }
        }
    });
    // Script para mostrar vista previa de la imagen de perfil antes de cargarla
    const imageInput = document.getElementById('image');
    const previewContainer = document.createElement('div');  // Creamos un contenedor para la vista previa
    imageInput.insertAdjacentElement('afterend', previewContainer);  // Insertamos el contenedor justo después del input de la imagen

    imageInput.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;  // Establecemos la imagen cargada como fuente
                img.alt = "Vista previa";
                img.style.maxWidth = "200px";  // Ajustamos el tamaño máximo de la vista previa
                previewContainer.innerHTML = '';  // Limpiamos cualquier imagen previa antes de mostrar la nueva
                previewContainer.appendChild(img);  // Añadimos la imagen al contenedor
            }

            reader.readAsDataURL(file);  // Leemos el archivo como URL de datos
        }
    });
    </script>
</body>
</html>
