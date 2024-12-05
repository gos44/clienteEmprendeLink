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
        .rol-selector {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .inputForm {
            margin-bottom: 15px;
        }

        .input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .button-submit {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        .button-submit:hover {
            background-color: #45a049;
        }

        .flex-column {
            display: flex;
            flex-direction: column;
            margin-bottom: 10px;
        }

        .flex-row {
            display: flex;
            justify-content: flex-end;
        }

        .span {
            color: #007bff;
            text-decoration: none;
            font-size: 0.9em;
        }

        .span:hover {
            text-decoration: underline;
        }

        .p {
            text-align: center;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <form class="form" action="{{ route('iniciar_sesion_usuario.login') }}" method="POST">
        @csrf <!-- Token de seguridad para Laravel -->
        <div class="flex-column">
            <label for="email">Correo Electrónico</label>
        </div>
        <div class="inputForm">
            <input type="email" id="email" class="input" name="email" placeholder="Ingrese su correo electrónico" required />
        </div>

        <div class="flex-column">
            <label for="password">Contraseña</label>
        </div>
        <div class="inputForm">
            <input type="password" id="password" class="input" name="password" placeholder="Ingrese su contraseña" required />
        </div>

        <div class="flex-column">
            <label for="role">Seleccione su Rol</label>
        </div>
        <div class="inputForm">
            <select id="role" name="role" class="rol-selector" required>
                <option value="">Seleccione su rol</option>
                <option value="entrepreneur">Emprendedor</option>
                <option value="investor">Inversor</option>
            </select>
        </div>

        @if ($errors->any())
            <div style="color: red; margin-bottom: 15px;">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <div class="flex-row">
            <a class="span" href="{{ route('verificar_identidad_usuario') }}">¿Olvidaste tu contraseña?</a>
        </div>

        <button type="submit" class="button-submit">Iniciar sesión</button>

        <p class="p">¿No tienes una cuenta? <a href="{{ route('registrar_nuevo_usuario.store') }}" class="span">Regístrate</a></p>
    </form>
</body>
</html>
