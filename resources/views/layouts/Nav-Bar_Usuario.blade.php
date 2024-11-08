<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Bootstrap</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Estilos generales del navbar */
        .navbar {
            background-color: #f8f9fa;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 0.5rem 1rem;
            color: black

        }

        .nav-link {
            color: black;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: gray ;
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            border-radius: 8px;
            padding: 0.5rem 0;
        }

        .dropdown-item {
            padding: 0.7rem 1.5rem;
            transition: background-color 0.3s ease;
        }

        .dropdown-item:hover {
            background-color: #f8f9fa;
        }

        /* Elementos móviles ocultos por defecto */
        .mobile-only {
            display: none;
        }

        /* Estilos para móvil */
        @media (max-width: 991.98px) {
            .navbar-collapse {
                position: fixed;
                top: 0;
                left: 0;
                padding-left: 15px;
                padding-right: 15px;
                padding-bottom: 15px;
                width: 75%;
                height: 100%;
                z-index: 1050;
                background-color: white;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                overflow-y: auto;
            }

            .navbar-nav {
                padding-top: 60px;
            }

            /* Mostrar elementos móviles */
            .mobile-only {
                display: block;
            }

            /* Ocultar dropdowns en móvil */
            .desktop-only {
                display: none;
            }

            .navbar-toggler {
                position: relative;
                z-index: 2000;
            }

            .navbar-nav .nav-item {
                margin-bottom: 10px;
            }

            .navbar-nav .nav-link {
                padding: 10px;
                border-radius: 5px;
            }

            .navbar-nav .nav-link:hover {
                background-color: gray;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand me-4" href="{{ route('Home_Usuario.index') }}">
                <img src="images/16.png" alt="Logo" width="180" height="70">
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
                    <li class="nav-item me-3">
                        <a class="nav-link" href="{{ route('filtrar_usuario') }}">

                            <i class="fas fa-search fa-lg me-1"></i> Buscar Emprendimientos
                        </a>
                    </li>

                    <!-- Emprendimientos (Dropdown solo en desktop) -->
                    <li class="nav-item dropdown me-3 desktop-only">
                        <a class="nav-link dropdown-toggle" href="#" id="emprendimientosDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-briefcase fa-lg me-1"></i> Mis Emprendimientos
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="emprendimientosDropdown">
                            <li>
                                <a class="dropdown-item" href="ListaMisEmprendiientos.html">
                                    <i class="fas fa-list me-2"></i> Ver Mis Emprendimientos
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('Publicar_Emprendimiento1') }}">
                                    <i class="fas fa-plus-circle me-2"></i> Publicar Nuevo
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="ListaUsuarios.html">
                                    <i class="fas fa-users me-2"></i> Lista de Usuarios
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Comunicación (Dropdown solo en desktop) -->
                    <li class="nav-item dropdown me-3 desktop-only">
                        <a class="nav-link dropdown-toggle" href="#" id="communicationDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-comments fa-lg me-1"></i> Comunicación
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="communicationDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('Chat_Usuario.index') }}">
                                    <i class="fas fa-comment-dots me-2"></i> Chat
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="notificaciones1 copy.html">
                                    <i class="fas fa-bell me-2"></i> Notificaciones
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Opciones de emprendimiento en móvil -->
                    <li class="nav-item mobile-only me-3">
                        <a class="nav-link" href="ListaMisEmprendiientos.html">
                            <i class="fas fa-list fa-lg me-1"></i> Ver Mis Emprendimientos
                        </a>
                    </li>
                    <li class="nav-item mobile-only me-3">
                        <a class="nav-link" href="{{ route('Publicar_Emprendimiento1') }}">
                            <i class="fas fa-plus-circle fa-lg me-1"></i> Publicar Emprendimiento
                        </a>
                    </li>
                    <li class="nav-item mobile-only me-3">
                        <a class="nav-link" href="ListaUsuarios.html">
                            <i class="fas fa-users fa-lg me-1"></i> Lista de Usuarios
                        </a>
                    </li>

                    <!-- Opciones de comunicación en móvil -->
                    <li class="nav-item mobile-only me-3">
                        <a class="nav-link" href="CHAT-EMPRENDEDOR.HTML">
                            <i class="fas fa-comment-dots fa-lg me-1"></i> Chat
                        </a>
                    </li>
                    <li class="nav-item mobile-only me-3">
                        <a class="nav-link" href="notificaciones1 copy.html">
                            <i class="fas fa-bell fa-lg me-1"></i> Notificaciones
                        </a>
                    </li>

                    <!-- Ayuda -->
                    <li class="nav-item me-3">
                        <a class="nav-link" href="contactanos1 copy.html">
                            <i class="fas fa-question-circle fa-lg me-1"></i> Ayuda
                        </a>
                    </li>

                    <!-- Perfil -->
                    <li class="nav-item me-3">
                        <a class="nav-link" href="perfilUsaurio.html">
                            <i class="fas fa-user fa-lg me-1"></i> Perfil
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
