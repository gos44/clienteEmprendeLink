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
        /* Ajuste para el menú hamburguesa */
        @media (max-width: 991.98px) {
            .navbar-collapse {
                position: absolute;
                top: 0;
                left: 0;
                z-index: 1050;
                width: 300px; /* Limita el ancho de la caja */
                background-color: white;
                padding: 10px;
                border-radius: 5px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

            .navbar-nav {
                flex-direction: column;
                text-align: left;
            }

            .navbar-toggler {
                position: relative;
                z-index: 2000;
            }

            .navbar-toggler.collapsed + .navbar-collapse {
                display: none; /* Oculta el menú cuando está colapsado */
            }

            .navbar-nav .nav-item {
                margin-bottom: 10px;
            }

            
            .navbar-nav .nav-link {
                color: black;
                padding: 10px;
                border-radius: 5px;
                text-align: left;
            }

            .navbar-nav .nav-link:hover {
                background-color: #f8f9fa;
            }

            .dropdown-item {
                color: black;
            }

            .dropdown-item:hover {
                background-color: #f8f9fa;
            }

            /* Limita el ancho del menú desplegable */
            .dropdown-menu {
                background-color: white;
                color: black;
                padding: 10px;
                width: auto; /* Ajusta el tamaño al contenido */
                border: 1px solid #ccc;
                border-radius: 5px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 1);
            }
        }
        .nav-link {
                color: rgb(0, 0, 0);
            }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light w-100">
        <div class="container-fluid">
            <!-- Logo con espacio a la derecha -->
            <a class="navbar-brand me-3" href="HOME.HTML"><img src="{{asset('images/16.png')}}" alt="" width="250" height="90"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item me-3">
                        <a class="nav-link active" aria-current="page" href="HOME.HTML"><i class="fas fa-home fa-lg me-1"></i> Inicio</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="busqueda_filtro.html"><i class="fas fa-search fa-lg me-1"></i> Buscar Emprendimientos</a>
                    </li>

                    <!-- Dropdown Sobre emprendimientos en pantallas grandes -->
                    <li class="nav-item dropdown me-3 d-none d-lg-block">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-briefcase fa-lg me-1"></i> Sobre emprendimientos
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="ListaUsuarios.html">Lista de Usuarios</a></li>
                            <li><a class="dropdown-item" href="ListaMisEmprendiientos.html">Mis emprendimientos</a></li>
                            <li><a class="dropdown-item" href="publicarEmprendimiento.html">Publicar Emprendimiento</a></li>
                        </ul>
                    </li>

                    <!-- Opciones de emprendimiento sin dropdown en el menú hamburguesa -->
                    <li class="nav-item d-lg-none me-3">
                        <a class="nav-link" href="ListaUsuarios.html"><i class="fas fa-list fa-lg me-1"></i> Consultar Lista</a>
                    </li>
                    <li class="nav-item d-lg-none me-3">
                        <a class="nav-link" href="MI-EMPRENDIMIENTO.HTML"><i class="fas fa-briefcase fa-lg me-1"></i> Mis emprendimientos</a>
                    </li>
                    <li class="nav-item d-lg-none me-3">
                        <a class="nav-link" href="publicarEmprendimiento.html"><i class="fas fa-upload fa-lg me-1"></i> Publicar Emprendimiento</a>
                    </li>

                    <li class="nav-item me-3">
                        <a class="nav-link" href="CHAT-EMPRENDEDOR.HTML"><i class="fas fa-comments fa-lg me-1"></i> Chat</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="contactanos1 copy.html"><i class="fas fa-question-circle fa-lg me-1"></i> Ayuda</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="notificaciones1 copy.html"><i class="fas fa-bell fa-lg me-1"></i> Notificaciones</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="perfilUsaurio.html"><i class="fas fa-user fa-lg me-1"></i> Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.html"><i class="fas fa-sign-out-alt fa-lg me-1"></i> Cerrar sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
