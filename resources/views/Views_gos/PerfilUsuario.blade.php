<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario - Emprende Link</title>
    <link rel="icon" href="img/logoCuadrado.png" type="image/png">
    <link rel="stylesheet" href="{{ asset('/css/perfil.css') }}">

    <link rel="stylesheet" href="http://localHost/clienteEmprendeLink/resources/css/perfil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div id="navbar-container"></div>

    <script src="http://localHost/clienteEmprendeLink/resources/js/navbarInversionista.js"></script>
  
  
    <main class="profile-container">
        <div class="profile-banner">
            <div class="profile-img">
                <img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/81273ca7-55d8-4cbc-8794-1b39725c261e/dga6e4t-0db8f8c3-e59c-45b4-8e5e-997ad15c9a20.jpg/v1/fill/w_894,h_894,q_70,strp/sukuna_smile_manga_3_by_ae19oe_dga6e4t-pre.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9MzYwMCIsInBhdGgiOiJcL2ZcLzgxMjczY2E3LTU1ZDgtNGNiYy04Nzk0LTFiMzk3MjVjMjYxZVwvZGdhNmU0dC0wZGI4ZjhjMy1lNTljLTQ1YjQtOGU1ZS05OTdhZDE1YzlhMjAuanBnIiwid2lkdGgiOiI8PTM2MDAifV1dLCJhdWQiOlsidXJuOnNlcnZpY2U6aW1hZ2Uub3BlcmF0aW9ucyJdfQ.l_g3-4d6r-AZyDHigTm9byy-tFurBL7Ts73QeFCzXGg" alt="Foto de perfil">
            </div>
        </div>

        <div class="profile-info">
            <div class="info-group">
                <label><i class="fas fa-user"></i> Nombre:</label>
                <input type="text" value="Gustavo Andres Sanchez Ceron" readonly>
            </div>
            <div class="info-group">
                <label><i class="fas fa-calendar"></i> Fecha de nacimiento:</label>
                <input type="text" value="Nacido(a) el 05 de septiembre de 2002" readonly>
            </div>
            <div class="info-group">
                <label><i class="fas fa-envelope"></i> Correo:</label>
                <input type="email" value="sdp402@gmail.com" readonly>
            </div>
            <div class="info-group">
                <label><i class="fas fa-map-marker-alt"></i> Ubicación:</label>
                <input type="text" value="POPAYAN-Cauca-Colombia" readonly>
            </div>
            <div class="info-group">
                <label><i class="fas fa-phone"></i> Celular:</label>
                <input type="tel" value="3214567890" readonly>
            </div>
            <div class="info-group">
                <label><i class="fas fa-venus-mars"></i> Género:</label>
                <input type="text" value="Masculino" readonly>
            </div>
            <div class="info-group">
                <label><i class="fas fa-book"></i> Etapa:</label>
                <input type="text" value="Primera fase: la idea de negocio" readonly>
            </div>
            <div class="info-group">
                <label><i class="fas fa-id-card"></i> Documento:</label>
                <input type="text" value="19861598659864" readonly>
            </div>
        </div>

        <div class="profile-actions">
            <button class="btn-primary" onclick="window.location.href='perfilUsaurioEditarPerfil.html'">
                Editar perfil
            </button>
            <button class="btn-outline" onclick="window.location.href='index.html'">
                Cerrar Sesión
            </button>
        </div>
    </main>

    <div id="Footer"></div>

    <script src="http://localHost/clienteEmprendeLink/resources/js/navbarUsuario.js"></script>
      
</body>
</html>
