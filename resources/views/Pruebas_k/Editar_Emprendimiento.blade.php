<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emprende Link - Editar Emprendimiento</title>

    <link rel="stylesheet" href="{{ asset('css/Editar_Emprendimiento.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    @extends('layouts.Nav-Bar_Usuario')

    <main> 
        <div class="main-content" id="entrepreneurship-edit-form">
            <!-- Hero Section -->
            <section class="hero">
                <div class="hero-background image-container">
                    <img src="" alt="Fondo del Emprendimiento" data-image="hero-background" id="heroBackground" class="changeable-image">
                    <input type="file" class="image-upload" id="heroBackgroundUpload" accept="image/*">
                </div>
         
                <div class="hero-overlay"></div>
                <div class="hero-content">
                    <div class="hero-main">
                        <div class="image-container">
                            <img src="" alt="Logo del Emprendimiento" class="hero-logo changeable-image" id="heroLogo">
                        </div>
                        <h1 contenteditable="true" id="entrepreneurship-name"></h1>
                        <p class="hero-quote" contenteditable="true" id="entrepreneurship-slogan"></p>
                    </div>
                    <div class="hero-buttons">
                        <button class="btn btn-primary" onclick="saveEntrepreneurship()">Guardar Cambios</button>
                        <button class="btn btn-secondary" onclick="deleteEntrepreneurship()">Eliminar</button>
                    </div>
                </div>
            </section>

            <div class="background-change-container">
                <button id="changeBackgroundBtn" class="change-background-btn">
                    <i class="fas fa-image"></i>
                    Cambiar imagen de fondo
                </button>
            </div>

            <!-- Profile Section -->
            <section class="profile">
                <div class="profile-card">
                    <img src="" alt="Emprendedor" class="profile-image" id="entrepreneur-image">
                    <div class="profile-info">
                        <h2 contenteditable="true" id="entrepreneur-name"></h2>
                        <p contenteditable="true" id="entrepreneur-email"><i class="fas fa-envelope"></i></p>
                        <p contenteditable="true" id="entrepreneur-location"><i class="fas fa-map-marker-alt"></i></p>
                        <p contenteditable="true" id="entrepreneur-phone"><i class="fas fa-phone"></i></p>
                    </div>
                </div>
            </section>

            <div class="content">
                <!-- Products Section -->
                <section class="products" id="products-container">
                    <!-- Products will be dynamically added here -->
                    <button id="add-product-btn" class="add-product-btn">
                        <i class="fas fa-plus"></i> Agregar Producto
                    </button>
                </section>
        
                <!-- Description Section -->
                <section class="description">
                    <h3 contenteditable="true">Descripción</h3>
                    <p contenteditable="true" id="general-description"></p>
                </section>
            </div>
        </div>
    </main>

    <script>
        // Global variable to store entrepreneurship ID
        let entrepreneurshipId = null;

        // Fetch entrepreneurship details on page load
        document.addEventListener('DOMContentLoaded', function() {
            // Assuming you pass the entrepreneurship ID via URL or some method
            entrepreneurshipId = getEntrepreneurshipIdFromURL(); // Implement this function
            fetchEntrepreneurshipDetails();
        });

        function getEntrepreneurshipIdFromURL() {
            // Extract ID from URL or use a hidden input
            // Example: return new URLSearchParams(window.location.search).get('id');
            return /* Your ID retrieval logic */;
        }

        function fetchEntrepreneurshipDetails() {
            fetch(`/api/entrepreneurships/${entrepreneurshipId}`)
                .then(response => response.json())
                .then(data => {
                    // Populate hero section
                    document.getElementById('heroBackground').src = data.cover_path;
                    document.getElementById('heroLogo').src = data.logo_path;
                    document.getElementById('entrepreneurship-name').textContent = data.name;
                    document.getElementById('entrepreneurship-slogan').textContent = data.slogan;

                    // Populate entrepreneur profile
                    document.getElementById('entrepreneur-image').src = data.entrepreneur.image;
                    document.getElementById('entrepreneur-name').textContent = `${data.entrepreneur.name} ${data.entrepreneur.lastname}`;
                    document.getElementById('entrepreneur-email').innerHTML = `<i class="fas fa-envelope"></i> ${data.entrepreneur.email}`;
                    document.getElementById('entrepreneur-location').innerHTML = `<i class="fas fa-map-marker-alt"></i> ${data.entrepreneur.location}`;
                    document.getElementById('entrepreneur-phone').innerHTML = `<i class="fas fa-phone"></i> ${data.entrepreneur.phone}`;

                    // Populate products
                    const productNames = JSON.parse(data.name_products);
                    const productDescriptions = JSON.parse(data.product_descriptions);
                    const productImages = JSON.parse(data.product_images);

                    const productsContainer = document.getElementById('products-container');
                    productNames.forEach((name, index) => {
                        addProductToPage(name, productDescriptions[index], productImages[index]);
                    });

                    // Populate general description
                    document.getElementById('general-description').textContent = data.general_description;
                })
                .catch(error => {
                    console.error('Error fetching entrepreneurship details:', error);
                    alert('No se pudieron cargar los detalles del emprendimiento');
                });
        }

        function addProductToPage(name, description, imageUrl) {
            const productContainer = document.getElementById('products-container');
            const productElement = document.createElement('div');
            productElement.className = 'product';
            productElement.innerHTML = `
                <div class="image-container">
                    <img src="${imageUrl}" alt="${name}" class="changeable-image">
                </div>
                <div class="product-info">
                    <h4 contenteditable="true">${name}</h4>
                    <p contenteditable="true">${description}</p>
                </div>
            `;

            // Insert before the "Add Product" button
            const addProductBtn = document.getElementById('add-product-btn');
            productContainer.insertBefore(productElement, addProductBtn);
        }

        function saveEntrepreneurship() {
            // Collect all form data
            const formData = new FormData();
            formData.append('name', document.getElementById('entrepreneurship-name').textContent);
            formData.append('slogan', document.getElementById('entrepreneurship-slogan').textContent);
            formData.append('general_description', document.getElementById('general-description').textContent);

            // Collect product data
            const productElements = document.querySelectorAll('.product');
            const productNames = [];
            const productDescriptions = [];

            productElements.forEach(product => {
                productNames.push(product.querySelector('h4').textContent);
                productDescriptions.push(product.querySelector('p').textContent);
            });

            formData.append('name_products', JSON.stringify(productNames));
            formData.append('product_descriptions', JSON.stringify(productDescriptions));

            // Handle image uploads
            const heroBackground = document.getElementById('heroBackground');
            const heroLogo = document.getElementById('heroLogo');

            if (heroBackground.files && heroBackground.files[0]) {
                formData.append('cover', heroBackground.files[0]);
            }

            if (heroLogo.files && heroLogo.files[0]) {
                formData.append('logo', heroLogo.files[0]);
            }

            // Handle product images
            const productImages = document.querySelectorAll('.product img');
            productImages.forEach((img, index) => {
                if (img.files && img.files[0]) {
                    formData.append(`product_image_${index + 1}`, img.files[0]);
                }
            });

            // Send update request
            fetch(`/api/entrepreneurships/${entrepreneurshipId}`, {
                method: 'POST', // or PUT/PATCH depending on your API
                body: formData,
                headers: {
                    'X-HTTP-Method-Override': 'PUT', // If your framework requires this
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Emprendimiento actualizado exitosamente');
                    // Optionally redirect or refresh
                } else {
                    alert('Error al actualizar el emprendimiento');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Ocurrió un error al guardar los cambios');
            });
        }

        function deleteEntrepreneurship() {
            if (confirm('¿Estás seguro de que deseas eliminar este emprendimiento?')) {
                fetch(`/api/entrepreneurships/${entrepreneurshipId}`, {
                    method: 'DELETE',
                    headers: {
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Emprendimiento eliminado exitosamente');
                        // Redirect to list of entrepreneurships
                        window.location.href = '/entrepreneurships';
                    } else {
                        alert('Error al eliminar el emprendimiento');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Ocurrió un error al eliminar el emprendimiento');
                });
            }
        }

        // Add product functionality
        document.getElementById('add-product-btn').addEventListener('click', function() {
            const productContainer = document.getElementById('products-container');
            const newProductElement = document.createElement('div');
            newProductElement.className = 'product';
            newProductElement.innerHTML = `
                <div class="image-container">
                    <img src="" alt="Nuevo Producto" class="changeable-image">
                    <input type="file" class="image-upload" accept="image/*">
                </div>
                <div class="product-info">
                    <h4 contenteditable="true">Nuevo Producto</h4>
                    <p contenteditable="true">Descripción del producto</p>
                </div>
            `;

            // Insert before the "Add Product" button
            productContainer.insertBefore(newProductElement, this);
        });
    </script>
</body>
</html>