<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicar Emprendimiento</title>
    <link rel="stylesheet" href="{{ asset('css/Publicar_Emprendimiento1.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Publicar_Emprendimiento2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Publicar_Emprendimiento3.css') }}">
</head>
<body>
    <br><br>
    <h1>¡Vamos a crear tu emprendimiento!</h1>

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

        <form method="POST" action="{{ route('guardarEmprendimiento') }}" enctype="multipart/form-data" id="emprendimiento-form">
            @csrf
            
            <!-- Paso 1: Información básica -->
            <div class="form-section">
                <div class="form-group">
                    <label for="name">Nombre del Emprendimiento</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <label for="slogan">Escribe tu eslogan</label>
                    <textarea id="slogan" name="slogan" required>{{ old('slogan') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="category">Categoría</label>
                    <select id="category" name="category" required>
                        <option value="">Seleccione una categoría</option>
                        <option value="articulos_deportivos" {{ old('category') == 'articulos_deportivos' ? 'selected' : '' }}>Artículos deportivos</option>
                        <option value="articulos_hogar" {{ old('category') == 'articulos_hogar' ? 'selected' : '' }}>Artículos para el hogar</option>
                        <option value="electronica" {{ old('category') == 'electronica' ? 'selected' : '' }}>Electrónica</option>
                        <option value="indumentaria" {{ old('category') == 'indumentaria' ? 'selected' : '' }}>Indumentaria</option>
                        <option value="instrumentos_musicales" {{ old('category') == 'instrumentos_musicales' ? 'selected' : '' }}>Instrumentos musicales</option>
                        <option value="mascotas" {{ old('category') == 'mascotas' ? 'selected' : '' }}>Productos de mascotas</option>
                        <option value="oficina" {{ old('category') == 'oficina' ? 'selected' : '' }}>Suministros de oficina</option>
                        <option value="artesanias" {{ old('category') == 'artesanias' ? 'selected' : '' }}>Artesanías</option>
                        <option value="herramientas" {{ old('category') == 'herramientas' ? 'selected' : '' }}>Herramientas de trabajo</option>
                        <option value="educacion" {{ old('category') == 'educacion' ? 'selected' : '' }}>Educación</option>
                        <option value="alimentacion" {{ old('category') == 'alimentacion' ? 'selected' : '' }}>Alimentación</option>
                        <option value="vehiculos" {{ old('category') == 'vehiculos' ? 'selected' : '' }}>Vehículos</option>
                    </select>
                </div>
            </div>

            <!-- Paso 2: Imágenes y Productos -->
            <div class="form-section">
                <div class="form-group">
                    <label for="logo_path">Elige tu logo (Debe ser cuadrado)</label>
                    <input type="file" id="logo_path" name="logo_path" accept="image/*" required>
                    <div class="image-preview square" id="logo-preview">
                        <img src="" alt="Logo preview">
                    </div>
                </div>

                <div class="form-group">
                    <label for="background">Elige una portada (Debe ser rectangular)</label>
                    <input type="file" id="background" name="background" accept="image/*" required>
                    <div class="image-preview rectangle" id="portada-preview">
                        <img src="" alt="Portada preview">
                    </div>
                </div>

                <div class="form-group">
                    <label for="products">Añade productos con sus detalles</label>
                    <div class="product-container" id="product-container">
                        <div class="product-item">
                            <input type="file" name="product_images[]" class="product-image-input" accept="image/*" required multiple>
                            <div class="product-image">
                                <img src="" alt="Vista previa del producto">
                            </div>
                            <input type="text" name="name_products" placeholder="Nombres de los productos (separados por comas)" required>
                            <textarea name="product_descriptions" placeholder="Descripciones de los productos (separadas por comas)" rows="4" required></textarea>
                        </div>
                    </div>
                    <button type="button" id="add-product" class="btn-agregar-producto">+ Agregar Producto</button>
                </div>
            </div>

            <!-- Paso 3: Descripción general -->
            <div class="form-section">
                <div class="form-group">
                    <label for="general_description">Añade una gran descripción general de todo tu emprendimiento</label>
                    <textarea id="general_description" name="general_description" required>{{ old('general_description') }}</textarea>
                </div>
            </div>

            <button type="submit" class="btn-publicar" id="publicarBtn">Publicar</button>
        </form>

        <!-- Modal -->
        <div id="myModal" class="modal" style="display: none;">
            <div class="modal-content">
                <span class="close">&times;</span>
                <p>¡Emprendimiento Publicado!</p>
                <a href="{{ route('MisEmpredimientos.index') }}" class="btn-aceptar">Aceptar</a>
            </div>
        </div>
    </div>

    <script>
        // Funciones de vista previa de imágenes
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
                previewImg.src = '';
            }
        }

        document.getElementById('logo_path').addEventListener('change', function() {
            handleImagePreview(this, 'logo-preview');
        });

        document.getElementById('background').addEventListener('change', function() {
            handleImagePreview(this, 'portada-preview');
        });

        // Manejo de productos dinámicos
        document.addEventListener('DOMContentLoaded', function() {
            const productContainer = document.getElementById('product-container');
            const addProductButton = document.getElementById('add-product');

            addProductButton.addEventListener('click', function() {
                const newProductItem = document.createElement('div');
                newProductItem.classList.add('product-item');
                newProductItem.innerHTML = `
                    <input type="file" name="product_images[]" class="product-image-input" accept="image/*" required multiple>
                    <div class="product-image">
                        <img src="" alt="Vista previa del producto">
                    </div>
                    <input type="text" name="name_products" placeholder="Nombres de los productos (separados por comas)" required>
                    <textarea name="product_descriptions" placeholder="Descripciones de los productos (separadas por comas)" rows="4" required></textarea>
                    <button type="button" class="btn-eliminar-producto">Eliminar Producto</button>
                `;

                // Agregar listener para vista previa de imagen
                const imageInput = newProductItem.querySelector('.product-image-input');
                const preview = newProductItem.querySelector('.product-image img');
                imageInput.addEventListener('change', function() {
                    const file = this.files[0];
                    const reader = new FileReader();
                    reader.onloadend = function () {
                        preview.src = reader.result;
                    };
                    if (file) {
                        reader.readAsDataURL(file);
                    } else {
                        preview.src = '';
                    }
                });

                // Agregar listener para eliminar producto
                const deleteButton = newProductItem.querySelector('.btn-eliminar-producto');
                deleteButton.addEventListener('click', function() {
                    productContainer.removeChild(newProductItem);
                });

                productContainer.appendChild(newProductItem);
            });

            // Modal logic
            var modal = document.getElementById("myModal");
            var form = document.getElementById("emprendimiento-form");
            var span = document.getElementsByClassName("close")[0];

            form.onsubmit = function(event) {
                event.preventDefault();
                modal.style.display = "block";
            };

            span.onclick = function() {
                modal.style.display = "none";
            };

            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            };
        });
    </script>

    <script src="{{ asset('js/Publicar_Emprendimiento.js') }}"></script>
</body>
</html>