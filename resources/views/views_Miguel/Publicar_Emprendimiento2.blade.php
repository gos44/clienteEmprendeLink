@extends('layouts.Nav-Bar_Usuario')
@extends('layouts.Footer_Usuario')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicar Emprendimiento</title>
    <link rel="stylesheet" href="{{ asset('css/Publicar_Emprendimiento2.css') }}">
</head>
<body>
    <br><br>
    <h1 style="text-align: center;">¡Vamos a crear tu emprendimiento!</h1>

    <div class="navigation">
        <div class="page">1</div>
        <div class="line"></div>
        <div class="page active">2</div>
        <div class="line"></div>
        <div class="page">3</div>
    </div>

    <div class="container">
        <h2>Registro de Emprendimiento</h2>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="/publicar-emprendimiento/paso-2" enctype="multipart/form-data" id="emprendimiento-form">
            @csrf
            <div class="form-sections">
                <div class="form-group">
                    <label for="logo">Elige tu logo (El logo debe ser cuadrado)</label>
                    <input type="file" id="logo" name="logo" accept="image/*" required>
                    <div class="image-preview square" id="logo-preview">
                        <img src="img/logoMarca.png" alt="Logo preview">
                    </div>
                </div>
                <div class="form-group">
                    <label for="portada">¡Elige una portada! (La portada debe ser rectangular)</label>
                    <input type="file" id="portada" name="portada" accept="image/*" required>
                    <div class="image-preview rectangle" id="portada-preview">
                        <img src="LINK/FONDO-VINOS.png" alt="Portada preview">
                    </div>
                </div>
                <div class="form-group">
                    <label>Añade cuatro de tus productos con una pequeña descripción</label>
                    <div class="products-container">
                        @for ($i = 0; $i < 4; $i++)
                        <div class="product-item" id="product{{ $i + 1 }}">
                            <input type="file" name="products[{{ $i }}][image]" class="product-image-input" accept="image/*" required>
                            <div class="product-image">
                                <img src="LINK/VINOS-{{ $i + 1 }}.png" alt="Product {{ $i + 1 }}">
                            </div>
                            <textarea name="products[{{ $i }}][descripcion]" placeholder="Descripción del producto" rows="4" required></textarea>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>
            <a href="{{ route('Publicar_Emprendimiento3') }}" class="btn-publicar">Siguiente</a>
        </form>
    </div>







    <script>


        // Función para manejar la vista previa de imágenes
function handleImagePreview(input, previewId) {
    const preview = document.getElementById(previewId);
    const previewImg = preview.querySelector('img');
    const file = input.files[0];
    const reader = new FileReader();

    reader.onloadend = function () {
        previewImg.src = reader.result;
    }

    if (file) {
        reader.readAsDataURL(file);
    } else {
        previewImg.src = ''; // Imagen vacía si no hay archivo seleccionado
    }
}

// Manejar la vista previa del logo
document.getElementById('logo').addEventListener('change', function() {
    handleImagePreview(this, 'logo-preview');
});

// Manejar la vista previa de la portada
document.getElementById('portada').addEventListener('change', function() {
    handleImagePreview(this, 'portada-preview');
});

// Manejar la vista previa de las imágenes de productos
document.querySelectorAll('.product-image-input').forEach(function(input) {
    input.addEventListener('change', function() {
        const productItem = this.closest('.product-item');
        const preview = productItem.querySelector('.product-image img');
        const file = this.files[0];
        const reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = ''; // Imagen vacía si no hay archivo seleccionado
        }
    });
});
    </script>

   <script src="{{ asset('js/Publicar_Emprendimiento.js') }}"></script>

</body>
</html>
