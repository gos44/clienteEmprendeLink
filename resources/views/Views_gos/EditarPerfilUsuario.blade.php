@extends('layouts.Nav-Bar_Usuario')
@extends('layouts.Footer_Usuario')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Inversionista - Emprende Link</title>

    <link rel="stylesheet" href="{{ asset('css/perfilEditarInversionista.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

  <form id="profile-form" class="profile-container">
    <div class="profile-banner">
        <div class="profile-img" onclick="openPhotoModal()">
            <img id="profile-photo" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="Foto de perfil">
        </div>
    </div>

    <div class="profile-info">
        <div class="info-group">
            <label><i class="fas fa-user"></i> Nombre:</label>
            <input type="text" name="name" value="Gustavo Andres Sanchez Ceron" required>
            <span class="error">El nombre es requerido</span>
        </div>

        <div class="info-group">
            <label><i class="fas fa-calendar"></i> Fecha de nacimiento:</label>
            <input type="date" name="birthdate" required>
            <span class="error">La fecha de nacimiento es requerida</span>
        </div>

        <div class="info-group">
            <label><i class="fas fa-envelope"></i> Correo:</label>
            <input type="email" name="email" value="sdp402@gmail.com" required>
            <span class="error">Ingrese un correo válido</span>
        </div>

        <div class="info-group">
            <label><i class="fas fa-map-marker-alt"></i> Ubicación:</label>
            <input type="text" name="location" value="POPAYAN-Cauca-Colombia" required>
            <span class="error">La ubicación es requerida</span>
        </div>

        <div class="info-group">
            <label><i class="fas fa-phone"></i> Celular:</label>
            <input type="tel" name="phone" value="3214567890" required pattern="[0-9]{10}">
            <span class="error">Ingrese un número de celular válido (10 dígitos)</span>
        </div>

        <div class="info-group">
            <label><i class="fas fa-venus-mars"></i> Género:</label>
            <select name="gender" required>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
                <option value="Otro">Otro</option>
            </select>
            <span class="error">Seleccione un género</span>
        </div>

        <!-- Nuevos campos para inversionista -->

        <div class="info-group">
          <label><i class="fas fa-file-pdf"></i> Certificado de Inversión:</label> Adjuntar PDF:
          <input type="file" name="investment_experience_file" accept=".pdf">
          <span class="error">Debe adjuntar un archivo en formato PDF si no se escribe la experiencia</span>
      </div>

      <div class="info-group">
        <label><i class="fas fa-file-pdf"></i> Experiencia en Inversión:</label> Adjuntar PDF:
        <input type="file" name="investment_experience_file" accept=".pdf">
        <span class="error">Debe adjuntar un archivo en formato PDF si no se escribe la experiencia</span>
    </div>

        <div class="info-group">
            <label><i class="fas fa-id-card"></i> Documento:</label>
            <input type="text" name="document" value="19861598659864" required pattern="[0-9]{10,15}">
            <span class="error">Ingrese un número de documento válido</span>
        </div>
    </div>

    <div class="profile-actions">
    <a href="{{ route('perfilUser.index') }}"> <button type="submit" class="btn-primary">Guardar cambios</button></a>
    <a href="{{ route('perfilUser.index') }}"><button type="button" class="btn-outline">Cancelar</button></a>
    </div>
</form>

<!-- Modal para cambiar foto -->
<div id="photo-modal" class="modal">
    <div class="modal-content">
        <h3>Cambiar foto de perfil</h3>
        <div class="file-input-container">
            <input type="file" id="photo-input" accept="image/*">
        </div>
        <div class="modal-actions">
            <button type="button" class="btn-outline" onclick="closePhotoModal()">Cancelar</button>
            <button type="button" class="btn-primary" onclick="updateProfilePhoto()">Guardar</button>
        </div>
    </div>
</div>

<script>
  // Funciones para el manejo de la foto de perfil
  function openPhotoModal() {
      document.getElementById('photo-modal').style.display = 'flex';
  }

  function closePhotoModal() {
      document.getElementById('photo-modal').style.display = 'none';
  }

  function updateProfilePhoto() {
      const fileInput = document.getElementById('photo-input');
      const file = fileInput.files[0];

      if (file) {
          const reader = new FileReader();
          reader.onload = function(e) {
              document.getElementById('profile-photo').src = e.target.result;
              closePhotoModal();
          }
          reader.readAsDataURL(file);
      }
  }

  // Manejo del formulario
  document.getElementById('profile-form').addEventListener('submit', function(e) {
      e.preventDefault();

      // Validar formulario
      if (this.checkValidity()) {
          // Aquí iría la lógica para guardar los cambios
          alert('Cambios guardados exitosamente');
          window.location.href = 'perfilInversor.html';
      } else {
          // Mostrar errores de validación
          const inputs = this.querySelectorAll('input, select');
          inputs.forEach(input => {
              const errorSpan = input.nextElementSibling;
              if (errorSpan && errorSpan.className === 'error') {
                  errorSpan.style.display = input.validity.valid ? 'none' : 'block';
              }
          });
      }
  });

  // Inicializar fecha de nacimiento
  const birthdateInput = document.querySelector('input[name="birthdate"]');
  const birthdate = new Date('2002-09-05');
  birthdateInput.value = birthdate.toISOString().split('T')[0];

  // Inicializar selects
  document.querySelector('select[name="gender"]').value = 'Masculino';
</script>

</body>
</html>
