
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

<!--linea 1 2 3 4 -->
<div class="navigation">
  <div class="page">1</div>
  <div class="line"></div>
  <div class="page active">2</div>
  <div class="line"></div>
  <div class="page">3</div>
  
</div>
<!-- fin linea 1 2 3 4 -->

<div class="container">
  <h2>Registro de Emprendimiento</h2>
  <form id="emprendimiento-form">
      <div class="form-sections">
          <div class="form-group">
              <label for="logo">Elige tu logo ( El logo debe ser cuadrado)</label>
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
                  <div class="product-item" id="product1">
                      <input type="file" class="product-image-input" accept="image/*">
                      <div class="product-image">
                          <img src="LINK/VINOS-1.png" alt="Product 1">
                      </div>
                      <textarea placeholder="Descripción del producto" rows="4"></textarea>
                  </div>
                  <div class="product-item" id="product2">
                      <input type="file" class="product-image-input" accept="image/*">
                      <div class="product-image">
                          <img src="LINK/VINOS-2.png" alt="Product 2">
                      </div>
                      <textarea placeholder="Descripción del producto" rows="4"></textarea>
                  </div>
                  <div class="product-item" id="product3">
                      <input type="file" class="product-image-input" accept="image/*">
                      <div class="product-image">
                          <img src="LINK/VINOS-3.png" alt="Product 3">
                      </div>
                      <textarea placeholder="Descripción del producto" rows="4"></textarea>
                  </div>
                  <div class="product-item" id="product4">
                      <input type="file" class="product-image-input" accept="image/*">
                      <div class="product-image">
                          <img src="LINK/VINOS-4.png" alt="Product 4">
                      </div>
                      <textarea placeholder="Descripción del producto" rows="4"></textarea>
                  </div>
              </div>
          </div>
      </div>
  </form>
  <a href="{{ route('Publicar_Emprendimiento3') }}" class="btn-publicar">Siguiente</a>
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
   
    
</body>
</html>