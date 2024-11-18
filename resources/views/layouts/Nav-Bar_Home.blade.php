<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand me-4" href="home_inversor.html">
            <img src="images/16.png" alt="Logo" width="180" height="70">
        </a>

        <!-- Botón hamburguesa para móviles -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Contenido del navbar -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto align-items-center">
                <!-- Opciones de Búsqueda -->
                <li class="nav-item dropdown nav-item-desktop mr-3">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" 
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-lg mr-1"></i> Búsqueda
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="searchDropdown">
                        <a class="dropdown-item" href="busqueda_filtro_inver.html">
                            <i class="fas fa-building mr-2"></i> Emprendimientos
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="ListaInversionista.html">
                            <i class="fas fa-users mr-2"></i> Lista de Usuarios
                        </a>
                    </div>
                </li>

                <!-- Versión móvil de Búsqueda -->
                <li class="nav-item nav-item-mobile">
                    <a class="nav-link" href="busqueda_filtro_inver.html">
                        <i class="fas fa-building mr-2"></i> Emprendimientos
                    </a>
                </li>
                <li class="nav-item nav-item-mobile">
                    <a class="nav-link" href="ListaInversionista.html">
                        <i class="fas fa-users mr-2"></i> Lista de Usuarios
                    </a>
                </li>

                <!-- Opciones de Comunicación -->
                <li class="nav-item dropdown nav-item-desktop mr-3">
                    <a class="nav-link dropdown-toggle" href="#" id="commDropdown" role="button" 
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-comments fa-lg mr-1"></i> Comunicación
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="commDropdown">
                        <a class="dropdown-item" href="CHAT-INVERSIONISTA.HTML">
                            <i class="fas fa-comment-dots mr-2"></i> Chat
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="inverNoti1.html">
                            <i class="fas fa-bell mr-2"></i> Notificaciones
                        </a>
                    </div>
                </li>

                <!-- Versión móvil de Comunicación -->
                <li class="nav-item nav-item-mobile">
                    <a class="nav-link" href="CHAT-INVERSIONISTA.HTML">
                        <i class="fas fa-comment-dots mr-2"></i> Chat
                    </a>
                </li>
                <li class="nav-item nav-item-mobile">
                    <a class="nav-link" href="inverNoti1.html">
                        <i class="fas fa-bell mr-2"></i> Notificaciones
                    </a>
                </li>

                <!-- Ayuda -->
                <li class="nav-item mr-3">
                    <a class="nav-link" href="contactanosInver1.html">
                        <i class="fas fa-question-circle fa-lg mr-1"></i> Ayuda
                    </a>
                </li>

                <!-- Perfil -->
                <li class="nav-item mr-3">
                    <a class="nav-link" href="perfilInversor.html">
                        <i class="fas fa-user fa-lg mr-1"></i> Perfil
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Estilos personalizados -->
<style>
    .navbar {
        background-color: #f8f9fa;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 0.5rem 1rem;
    }

    .navbar-nav .nav-link {
        color: black;
        font-weight: 500;
        padding: 0.8rem 1rem;
        transition: color 0.3s ease;
    }

    .navbar-nav .nav-link:hover {
        color: gray;
    }

    .dropdown-menu {
        border: none;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    .dropdown-item {
        padding: 0.7rem 1.5rem;
        transition: background-color 0.3s ease;
    }

    .dropdown-item:hover {
        background-color: #f8f9fa;
    }

    .dropdown-divider {
        margin: 0.5rem 0;
    }

    .nav-item-mobile {
        display: none;
    }

    @media (max-width: 991.98px) {
        .nav-item-desktop {
            display: none !important;
        }

        .nav-item-mobile {
            display: block;
        }
    }
</style>
