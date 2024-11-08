document.addEventListener('DOMContentLoaded', function() {
    // Preview de imagen antes de subir
    const fotoPerfilInput = document.getElementById('foto_perfil');
    const profilePhotoImg = document.getElementById('profile-photo');

    if (fotoPerfilInput && profilePhotoImg) {
        fotoPerfilInput.addEventListener('change', function(e) {
            if (e.target.files && e.target.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    profilePhotoImg.src = e.target.result;
                }
                reader.readAsDataURL(e.target.files[0]);
            }
        });
    }

    // Validación del formulario
    const form = document.getElementById('profile-form');
    if (form) {
        form.addEventListener('submit', function(e) {
            const inputs = this.querySelectorAll('input[required], select[required]');
            let isValid = true;

            inputs.forEach(input => {
                if (!input.validity.valid) {
                    isValid = false;
                    input.classList.add('is-invalid');
                } else {
                    input.classList.remove('is-invalid');
                }
            });

            if (!isValid) {
                e.preventDefault();
            }
        });

        // Validación en tiempo real
        const requiredInputs = form.querySelectorAll('input[required], select[required]');
        requiredInputs.forEach(input => {
            input.addEventListener('blur', function() {
                if (!this.validity.valid) {
                    this.classList.add('is-invalid');
                } else {
                    this.classList.remove('is-invalid');
                }
            });
        });
    }
});