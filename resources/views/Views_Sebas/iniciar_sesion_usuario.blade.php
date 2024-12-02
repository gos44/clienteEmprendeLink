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
        /* Estilos generales */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fa;
            margin: 0;
            padding: 0;
        }

        .form {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .flex-column {
            margin-bottom: 10px;
        }

        .inputForm {
            margin-bottom: 15px;
        }

        .input {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-size: 14px;
        }

        /* Estilos del selector de rol */
        .rol-selector {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f9f9f9;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .rol-selector:hover {
            border-color: #5cb85c;
            background-color: #f1f1f1;
        }

        .rol-selector:focus {
            border-color: #5cb85c;
            outline: none;
            background-color: #f1f1f1;
        }

        /* Estilos del botón */
        .button-submit {
            width: 100%;
            padding: 12px;
            background-color: #5cb85c;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button-submit:hover {
            background-color: #4cae4c;
        }

        .p {
            text-align: center;
            font-size: 14px;
        }

        .span {
            color: #5cb85c;
            text-decoration: none;
        }

        .span:hover {
            text-decoration: underline;
        }

        /* Estilos para los errores */
        .error-message {
            color: red;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <form class="form" action="{{ route('iniciar_sesion_usuario.login') }}" method="POST">
        @csrf <!-- Token de seguridad para Laravel -->
        <div class="flex-column">
            <label>Iniciar Sesión</label>
        </div>

        @if ($errors->any())
            <div class="error-message">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <div class="inputForm">
            <input type="email" class="input" name="email" placeholder="Ingrese su correo electrónico" required />
        </div>

        <div class="flex-column">
            <label>Contraseña</label>
        </div>
        <div class="inputForm">
            <input type="password" class="input" name="password" placeholder="Ingrese su contraseña" required />
        </div>

        <div class="flex-column">
            <label>Seleccione su Rol</label>
        </div>
        <div class="inputForm">
            <select name="role" class="rol-selector" required>
                <option value="">Seleccione su rol</option>
                <option value="entrepreneur">Emprendedor</option>
                <option value="investor">Inversor</option>
            </select>
        </div>

        <div class="flex-row">
            <a class="span" href="{{ route('verificar_identidad_usuario') }}">¿Olvidaste tu contraseña?</a>
        </div>

        <button type="submit" class="button-submit">Iniciar sesión</button>

        <p class="p">¿No tienes una cuenta? <a href="{{ route('registrar_nuevo_usuario') }}" class="span">Regístrate</a></p>
    </form>
</body>
</html>
