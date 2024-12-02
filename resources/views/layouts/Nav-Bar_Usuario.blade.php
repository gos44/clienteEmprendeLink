<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elegant Navbar</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary-color: black;
            --hover-color: black;
            --background-color: #f4f6f7;
        }

        body {
            background-color: var(--background-color);
            font-family: 'Arial', sans-serif;
        }

        .navbar {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
        }

        .navbar-brand img {
            max-height: 50px;
            transition: transform 0.3s ease;
        }

        .navbar-brand img:hover {
            transform: scale(1.05);
        }

        .nav-link {
            color: var(--primary-color);
            font-weight: 600;
            margin: 0 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            color: var(--hover-color);
            background-color: gray;
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            border-radius: 10px;
            padding: 0.5rem 0;
            margin-top: 10px;
        }

        .dropdown-item {
            padding: 0.5rem 1.5rem;
            transition: all 0.3s ease;
        }

        .dropdown-item:hover {
            background-color: rgba(52, 152, 219, 0.1);
            color: var(--hover-color);
        }

        @media (max-width: 991.98px) {
            .navbar-collapse {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: white;
                box-shadow: -2px 0 15px rgba(0,0,0,0.1);
                z-index: 1050;
                padding: 20px;
                overflow-y: auto;
            }

            .navbar-nav {
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                padding-top: 20px;
            }

            .navbar-nav .nav-item {
                width: 100%;
                text-align: left;
                margin-bottom: 10px;
            }

            .navbar-nav .nav-link {
                padding: 10px;
                border-radius: 5px;
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand" href="{{ route('Home_Usuario.index') }}">
                <img src="images/16.png" alt="Logo">
            </a>

            <!-- Botón hamburguesa -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Contenido del navbar -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Búsqueda -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('filtrar_usuario') }}">
                            <i class="fas fa-search me-2"></i> Búsqueda
                        </a>
                    </li>

                    <!-- Emprendimientos -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('MisEmpredimientos.index') }}">
                            <i class="fas fa-list me-2"></i> Mis Emprendimientos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('Publicar_Emprendimiento1') }}">
                            <i class="fas fa-plus-circle me-2"></i> Publicar Nuevo
                        </a>
                    </li>

                    <!-- Usuarios -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('listaUsuarios.index') }}">
                            <i class="fas fa-users me-2"></i> Lista de Usuarios
                        </a>
                    </li>

                    <!-- Ayuda -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ContactanosUsu') }}">
                            <i class="fas fa-question-circle me-2"></i> Ayuda
                        </a>
                    </li>

                    <!-- Notificaciones -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('Notificaciones') }}">
                            <i class="fas fa-bell me-2"></i> Notificaciones
                        </a>
                    </li>

                    <!-- Perfil -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('perfilUser.index') }}">
                            <i class="fas fa-user me-2"></i> Perfil
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
