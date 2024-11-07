document.addEventListener("DOMContentLoaded", function() {
    const navbar = `
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand me-4" href="home_inversor.html">
                <img src="link/16.png" alt="Logo" width="180" height="70">
            </a>
            
            <!-- Botón hamburguesa para móviles -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Contenido del navbar -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <!-- Opciones de Búsqueda -->
                    <li class="nav-item dropdown nav-item-desktop me-3">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" 
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-search fa-lg me-1"></i> Búsqueda
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="searchDropdown">
                            <li>
                                <a class="dropdown-item" href="busqueda_filtro_inver.html">
                                    <i class="fas fa-building me-2"></i> Emprendimientos
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="ListaInversionista.html">
                                    <i class="fas fa-users me-2"></i> Lista de Usuarios
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Versión móvil de Búsqueda -->
                    <li class="nav-item nav-item-mobile">
                        <a class="nav-link" href="busqueda_filtro_inver.html">
                            <i class="fas fa-building me-2"></i> Emprendimientos
                        </a>
                    </li>
                    <li class="nav-item nav-item-mobile">
                        <a class="nav-link" href="ListaInversionista.html">
                            <i class="fas fa-users me-2"></i> Lista de Usuarios
                        </a>
                    </li>

                    <!-- Opciones de Comunicación -->
                    <li class="nav-item dropdown nav-item-desktop me-3">
                        <a class="nav-link dropdown-toggle" href="#" id="commDropdown" role="button" 
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-comments fa-lg me-1"></i> Comunicación
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="commDropdown">
                            <li>
                                <a class="dropdown-item" href="CHAT-INVERSIONISTA.HTML">
                                    <i class="fas fa-comment-dots me-2"></i> Chat
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="inverNoti1.html">
                                    <i class="fas fa-bell me-2"></i> Notificaciones
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Versión móvil de Comunicación -->
                    <li class="nav-item nav-item-mobile">
                        <a class="nav-link" href="CHAT-INVERSIONISTA.HTML">
                            <i class="fas fa-comment-dots me-2"></i> Chat
                        </a>
                    </li>
                    <li class="nav-item nav-item-mobile">
                        <a class="nav-link" href="inverNoti1.html">
                            <i class="fas fa-bell me-2"></i> Notificaciones
                        </a>
                    </li>

                    <!-- Ayuda -->
                    <li class="nav-item me-3">
                        <a class="nav-link" href="contactanosInver1.html">
                            <i class="fas fa-question-circle fa-lg me-1"></i> Ayuda
                        </a>
                    </li>

                    <!-- Perfil -->
                    <li class="nav-item me-3">
                        <a class="nav-link" href="perfilInversor.html">
                            <i class="fas fa-user fa-lg me-1"></i> Perfil
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <style>
        .navbar {
            background-color: #f8f9fa;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
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
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
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

        /* Elementos móviles ocultos por defecto */
        .nav-item-mobile {
            display: none;
        }

        @media (max-width: 991.98px) {
            .navbar-nav {
                padding: 1rem 0;
            }
            
            .nav-item {
                padding: 0.5rem 0;
            }

            /* Ocultar elementos de escritorio */
            .nav-item-desktop {
                display: none !important;
            }

            /* Mostrar elementos móviles */
            .nav-item-mobile {
                display: block;
            }

            /* Ajustes adicionales para móvil */
            .navbar-nav .nav-link {
                padding: 0.8rem 1.5rem;
            }
        }
    </style>
    `;
    
    document.getElementById("navbar-container").innerHTML = navbar;
});