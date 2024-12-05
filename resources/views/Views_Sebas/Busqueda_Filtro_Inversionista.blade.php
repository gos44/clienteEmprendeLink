
@extends('layouts.Nav-Bar_Inversionista')
 <!-- Font Awesome -->

 <!DOCTYPE html>
 <html lang="es">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Emprende Link buscar emprendimientos</title>
     <link rel="stylesheet" href="{{ asset('css/busqueda_filtro_usuario.css') }}">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
 </head>
 <body>
 
 <div class="container-bar">
     <div class="sidebar-content">
         <div class="header-section">
             <h2>EMPRENDE LINK</h2>
             <div class="search-section">
                 <input type="text" id="searchInput" placeholder="Buscar...">
             </div>
         </div>
         <div class="divider"></div>
         <h3>Explorar Todo</h3>
         <ul>
             <li><a href="{{ route('filtrar_inver') }}"><img src="images/deportes.png" alt="Artículos deportivos">Todos los empredimientos</a></li>
             <li><a href="{{ route('emprendimientos_deportivos_inversionista') }}"><img src="images/deportes.png" alt="Artículos deportivos">Emprendimientos deportivos</a></li>
             <li><a href="#"><img src="images/deportes.png" alt="Artículos para el hogar">Emprendimientos sobre articulos de la casa hogar</a></li>
               <li><a href="#"><img src="images/electronica.png" alt="Electrónica">Empredimientos sobre Electrónica</a></li>
               <li><a href="#"><img src="images/indumentaria.png" alt="Indumentaria">Emprendimientos de indumentaria</a></li>
               <li><a href="#"><img src="images/musica.png" alt="Instrumentos musicales">Empredimientos sobre musica</a></li>
               <li><a href="#"><img src="images/mascotas.png" alt="Productos para mascotas">Empredimientos sobre productos para mascotas</a></li>
               <li><a href="#"><img src="images/oficina.png" alt="Suministros de oficina">Empredimientos sobre suministros de oficina</a></li>
               <li><a href="#"><img src="images/artesanias.png" alt="Artesanías">Empredimientos sobre artesanías</a></li>
               <li><a href="#"><img src="images/herramientas.png" alt="Herramientas de trabajo">Empredimientos sobre herramientas de trabajo</a></li>
               <li><a href="#"><img src="images/educacion.png" alt="Educación">Empredimientos sobre educación</a></li>
               <li><a href="#"><img src="images/alimentacion.png" alt="Alimentación">Empredimientos de alimentos</a></li>
               <li><a href="#"><img src="images/vehiculos.png" alt="Vehículos">Empredimientos sobre Vehículos</a></li>
         </ul>
     </div>
 
     <main class="main-content">
         <h2>RESULTADOS DE BUSQUEDA...</h2>
         <div class="row" id="resultados-container">
             @if(isset($publicaciones) && count($publicaciones) > 0)
                 @foreach($publicaciones as $publicacion)
                 <div class="col-md-6 card-item">
                     <div class="card">
                         <img src="{{ $publicacion['imagen_fondo'] }}" 
                              alt="Fondo de emprendimiento" class="background-img">
                         <img src="{{ $publicacion['logo'] }}" 
                              alt="Logo de emprendimiento" class="logo-img">
                         <h3>{{ $publicacion['name'] }}</h3>
                         <p>"{{ $publicacion['general_description'] }}"</p>
                         <button>
                             <a href="{{ route('Visitar_Emprendimiento_Inversor.index') }}">Visitar</a>
                         </button>
                     </div>
                 </div>
                 @endforeach
             @endif
         </div>
     
         <!-- Mensaje de no resultados -->
         <div id="no-results" style="display: none;">
             <h3>No se encontraron emprendimientos</h3>
             <p>Intenta con otra búsqueda</p>
         </div>
     
         <!-- Paginación con el estilo original -->
         <div class="pagination" id="pagination-container">
             @if($publicaciones->hasPages())
                 {{-- Botón Anterior --}}
                 <button class="page-btn" {{ $publicaciones->onFirstPage() ? 'disabled' : '' }} 
                         onclick="window.location.href='{{ $publicaciones->previousPageUrl() }}'">
                     &laquo;
                 </button>
                 
                 @php
                     $start = 1;
                     $end = $publicaciones->lastPage();
                     $current = $publicaciones->currentPage();
                     
                     // Si hay más de 7 páginas, mostrar un rango dinámico
                     if ($end > 7) {
                         if ($current <= 4) {
                             $start = 1;
                             $end = 7;
                         } elseif ($current >= $publicaciones->lastPage() - 3) {
                             $start = $publicaciones->lastPage() - 6;
                             $end = $publicaciones->lastPage();
                         } else {
                             $start = $current - 3;
                             $end = $current + 3;
                         }
                     }
                 @endphp
     
                 {{-- Primera página si no está en el rango --}}
                 @if($start > 1)
                     <button class="page-btn" onclick="window.location.href='{{ $publicaciones->url(1) }}'">1</button>
                     @if($start > 2)
                         <span class="page-ellipsis">...</span>
                     @endif
                 @endif
     
                 {{-- Rango de páginas --}}
                 @for($i = $start; $i <= $end; $i++)
                     <button class="page-btn {{ $current == $i ? 'active' : '' }}"
                             onclick="window.location.href='{{ $publicaciones->url($i) }}'">
                         {{ $i }}
                     </button>
                 @endfor
     
                 {{-- Última página si no está en el rango --}}
                 @if($end < $publicaciones->lastPage())
                     @if($end < $publicaciones->lastPage() - 1)
                         <span class="page-ellipsis">...</span>
                     @endif
                     <button class="page-btn" onclick="window.location.href='{{ $publicaciones->url($publicaciones->lastPage()) }}'">
                         {{ $publicaciones->lastPage() }}
                     </button>
                 @endif
     
                 {{-- Botón Siguiente --}}
                 <button class="page-btn" {{ !$publicaciones->hasMorePages() ? 'disabled' : '' }}
                         onclick="window.location.href='{{ $publicaciones->nextPageUrl() }}'">
                     &raquo;
                 </button>
             @endif
         </div>
     
         <!-- ... (resto del contenido igual) ... -->
     
         <style>
         .pagination {
             display: flex;
             justify-content: center;
             align-items: center;
             gap: 0.5rem;
             margin: 2rem 0;
         }
     
         .page-btn {
             padding: 0.5rem 1rem;
             border: 1px solid #ddd;
             background: white;
             cursor: pointer;
             border-radius: 4px;
             transition: all 0.3s;
         }
     
         .page-btn:hover:not([disabled]) {
             background: #f0f0f0;
         }
     
         .page-btn.active {
             background: #191919;
             color: white;
             border-color: #000000;
         }
     
         .page-btn[disabled] {
             opacity: 0.5;
             cursor: not-allowed;
         }
     
         .page-ellipsis {
             padding: 0.5rem;
         }
         </style>
     </main>
     
     <script>
     const searchInput = document.getElementById('searchInput');
     const resultsContainer = document.getElementById('resultados-container');
     const noResults = document.getElementById('no-results');
     const paginationContainer = document.getElementById('pagination-container');
     
     searchInput.addEventListener('input', function () {
         const searchTerm = this.value.toLowerCase();
         const cards = document.querySelectorAll('.card-item');
         let hasResults = false;
     
         cards.forEach(card => {
             const title = card.querySelector('h3').textContent.toLowerCase();
             const description = card.querySelector('p').textContent.toLowerCase();
     
             if (title.includes(searchTerm) || description.includes(searchTerm)) {
                 card.style.display = '';
                 hasResults = true;
             } else {
                 card.style.display = 'none';
             }
         });
     
         // Mostrar/ocultar mensaje de no resultados y paginación
         if (!hasResults) {
             noResults.style.display = 'block';
             paginationContainer.style.display = 'none';
         } else {
             noResults.style.display = 'none';
             paginationContainer.style.display = 'block';
         }
     });
     </script>
 
 </body>
 </html>
