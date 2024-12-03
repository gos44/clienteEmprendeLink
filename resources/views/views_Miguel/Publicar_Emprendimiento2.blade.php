@extends('layouts.Nav-Bar_Usuario')
@extends('layouts.Footer_Usuario')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicar Emprendimiento - Paso 2</title>
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
        <h2>Registro de Emprendimiento - Imágenes y Productos</h2>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('guardarPaso2') }}" enctype="multipart/form-data" id="emprendimiento-form">
            @csrf

            <!-- Logo -->
            <div class="form-group">
                <label for="logo_path">Elige tu logo (Debe ser cuadrado)</label>
                <input type="file" id="logo_path" name="logo_path" accept="image/*" required>
                <div class="image-preview square" id="logo-preview">
                    <img src="" alt="Logo preview">
                </div>
            </div>

            <!-- Portada -->
            <div class="form-group">
                <label for="background">Elige una portada (Debe ser rectangular)</label>
                <input type="file" id="background" name="background" accept="image/*" required>
                <div class="image-preview rectangle" id="portada-preview">
                    <img src="" alt="Portada preview">
                </div>
            </div>

            <!-- Productos -->
            <div class="form-group">
                <label for="products">Añade hasta cuatro productos con sus detalles</label>
                <div class="products-container">
                    @for ($i = 0; $i < 4; $i++)
                    <div class="product-item" id="product{{ $i + 1 }}">
                        <input type="file" name="product_images[{{ $i }}]" class="product-image-input" accept="image/*" required>
                        <div class="product-image">
                            <img src="" alt="Vista previa del producto">
                        </div>
                        <input type="text" name="name_products[{{ $i }}]" placeholder="Nombre del producto" required>
                        <textarea name="product_descriptions[{{ $i }}]" placeholder="Descripción del producto" rows="4" required></textarea>
                    </div>
                    @endfor
                </div>
            </div>

            <button type="submit" class="btn-publicar">Siguiente</button>
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
            };

            if (file) {
                reader.readAsDataURL(file);
            } else {
                previewImg.src = ''; // Imagen vacía si no hay archivo seleccionado
            }
        }

        // Manejar la vista previa del logo
        document.getElementById('logo_path').addEventListener('change', function() {
            handleImagePreview(this, 'logo-preview');
        });

        // Manejar la vista previa de la portada
        document.getElementById('background').addEventListener('change', function() {
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
                };

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
