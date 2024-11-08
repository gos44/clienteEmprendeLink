
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
document.querySelector('select[name="stage"]').value = 'Primera fase: la idea de negocio';  