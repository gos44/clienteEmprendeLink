<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/registro_inversionista.css') }}">

    <title>Registro Inversionista</title>

</head>
<body>
    <form class="form">
        <div class="flex-column">
            <label class="form-title">Registro Inversionista</label>
        </div>

        <div class="form-grid">
            <!-- Columna Izquierda -->
            <div class="form-column">
                <div class="flex-column">
                    <label>Nombre</label>
                    <div class="inputForm">
                        <input type="text" class="input" placeholder="Ingrese su nombre" />
                    </div>
                </div>

                <div class="flex-column">
                    <label>Apellido</label>
                    <div class="inputForm">
                        <input type="text" class="input" placeholder="Ingrese su Apellido" />
                    </div>
                </div>

                <div class="flex-column">
                    <label>Documento</label>
                    <div class="inputForm">
                        <input type="text" class="input" placeholder="Ingrese su documento" />
                    </div>
                </div>

                <div class="flex-column">
                    <label>Correo electrónico</label>
                    <div class="inputForm">
                        <input type="email" class="input" id="emailInput" placeholder="Ingrese su correo electrónico" />
                    </div>
                    <p id="errorMessage" style="color:red; display:none;">Por favor, ingrese un correo electrónico válido que contenga un '@'</p>
                </div>
            </div>

            <!-- Columna Derecha -->
            <div class="form-column">
                <div class="flex-column">
                    <label>Teléfono principal</label>
                    <div class="inputForm">
                        <input type="tel" class="input" placeholder="Ingrese su teléfono principal" />
                    </div>
                </div>

                <div class="flex-column">
                    <label>Teléfono secundario</label>
                    <div class="inputForm">
                        <input type="tel" class="input" placeholder="Ingrese su teléfono secundario" />
                    </div>
                </div>

                <div class="flex-column">
                    <label>Documento de identidad (PDF)</label>
                    <div class="inputForm pdf-input">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 18H17V16H7V18Z" fill="#666"/>
                            <path d="M17 14H7V12H17V14Z" fill="#666"/>
                            <path d="M7 10H11V8H7V10Z" fill="#666"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6 2C4.34315 2 3 3.34315 3 5V19C3 20.6569 4.34315 22 6 22H18C19.6569 22 21 20.6569 21 19V9C21 5.13401 17.866 2 14 2H6ZM6 4H13V9H19V19C19 19.5523 18.5523 20 18 20H6C5.44772 20 5 19.5523 5 19V5C5 4.44772 5.44772 4 6 4ZM15 4.10002C16.6113 4.4271 17.9413 5.52906 18.584 7H15V4.10002Z" fill="#666"/>
                        </svg>
                        <input type="file" class="input pdf-file" accept=".pdf" id="docIdentidad" />
                        <label for="docIdentidad" class="pdf-label">Seleccionar archivo PDF<span class="file-name" id="docIdentidadName">Ningún archivo seleccionado</span></label>
                    </div>
                </div>

                <div class="flex-column">
                    <label>Comprobante de domicilio (PDF)</label>
                    <div class="inputForm pdf-input">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 18H17V16H7V18Z" fill="#666"/>
                            <path d="M17 14H7V12H17V14Z" fill="#666"/>
                            <path d="M7 10H11V8H7V10Z" fill="#666"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6 2C4.34315 2 3 3.34315 3 5V19C3 20.6569 4.34315 22 6 22H18C19.6569 22 21 20.6569 21 19V9C21 5.13401 17.866 2 14 2H6ZM6 4H13V9H19V19C19 19.5523 18.5523 20 18 20H6C5.44772 20 5 19.5523 5 19V5C5 4.44772 5.44772 4 6 4ZM15 4.10002C16.6113 4.4271 17.9413 5.52906 18.584 7H15V4.10002Z" fill="#666"/>
                        </svg>
                        <input type="file" class="input pdf-file" accept=".pdf" id="compDomicilio" />
                        <label for="compDomicilio" class="pdf-label">Seleccionar archivo PDF<span class="file-name" id="compDomicilioName">Ningún archivo seleccionado</span></label>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex-row">
            <span class="span"><a href="{{ route('ContactanosHome') }}" class="link">¿Necesitas ayuda?</a></span>
        </div>

        <a href="{{ route('registrar_inversionista_ingreso') }}" class="button-submit">Registrarse</a>

        <p class="p">¿Ya tienes una cuenta? <a href="{{ route('iniciar_sesion_inversionista') }}" class="span">Iniciar sesión</a></p>
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

        // Script para mostrar nombres de archivos PDF
        document.getElementById('docIdentidad').addEventListener('change', function(e) {
            const fileName = e.target.files[0]?.name || 'Ningún archivo seleccionado';
            document.getElementById('docIdentidadName').textContent = ': ' + fileName;
        });

        document.getElementById('compDomicilio').addEventListener('change', function(e) {
            const fileName = e.target.files[0]?.name || 'Ningún archivo seleccionado';
            document.getElementById('compDomicilioName').textContent = ': ' + fileName;
        });
    </script>
</body>
</html>
