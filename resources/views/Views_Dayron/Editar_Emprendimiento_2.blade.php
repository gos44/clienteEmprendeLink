
@extends('layouts.Nav-Bar_Usuario')



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emprende Link - Mercado de Vinos</title>

    <link rel="stylesheet" href="{{ asset('css/Editar_Emprendimiento.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    

</head>
<body>


<main> 
  <main> 
    <div class="main-content">
        <section class="hero">
            <div class="hero-background image-container">
                <img src="images/arepa_fondo.png" alt="Mercado de Vinos" data-image="hero-background" id="heroBackground" class="changeable-image">
                <input type="file" class="image-upload" id="heroBackgroundUpload" accept="image/*">
            </div>
            <div class="hero-overlay"></div>
            <div class="hero-content">
                <div class="hero-main">
                    <div class="image-container">
                        <img src="images/arepas.png" alt="Mercado de Vinos Logo" class="hero-logo changeable-image" id="heroLogo">
                        <!-- <input type="file" class="image-upload" id="heroLogoUpload" accept="image/*"> -->
                    </div>
                    <h1 contenteditable="true">Arepa Puro Maíz</h1>
                    <p class="hero-quote" contenteditable="true">"Somos un emprendimiento enfocado en el procesamiento de arepas"</p>
                </div>
                <div class="hero-buttons">
                    <a href="ListaMisEmprendiientos.html" class="btn btn-primary" onclick="saveChanges()">Guardar</a>
                    <a href="MI-EMPRENDIMIENTO-EDITAR-2-USUARIO.HTML" class="btn btn-secondary">Eliminar</a>
                </div>
            </div>
        </section>

        <div class="background-change-container">
            <button id="changeBackgroundBtn" class="change-background-btn">
                <i class="fas fa-image"></i>
                Cambiar imagen de fondo
            </button>
        </div>

        <section class="profile">
            <div class="profile-card">
                <img src="images/perfil.png" alt="Cristian Sebastian Delgado" class="profile-image">
                <div class="profile-info">
                    <h2 contenteditable="true">CRISTIAN SEBASTIAN DELGADO</h2>
                    <p contenteditable="true"><i class="fas fa-envelope"></i> <a href="mailto:cristiansdp@gmail.com">cristiansdp@gmail.com</a></p>
                    <p contenteditable="true"><i class="fas fa-map-marker-alt"></i> 40 - Jersey City, Gal / 86551</p>
                    <p contenteditable="true"><i class="fas fa-phone"></i> 320-898-7646</p>
                    <p contenteditable="true"><i class="fas fa-city"></i> Popayán</p>
                </div>
            </div>
        </section>

        <div class="content">
            <section class="products">
                <div class="product" id="product-template" style="display: none;">
                    <div class="image-container">
                        <img src="images/arepa" alt="" class="changeable-image">
                        <input type="file" class="image-upload" accept="image/*">
                    </div>
                    <div class="product-info">
                        <h4 contenteditable="true"></h4>
                        <p contenteditable="true"></p>
                    </div>
                </div>
        
                <div class="product" id="product-1">
                    <div class="image-container">
                        <img src="images/AREPA2.jpg" alt="Vino tinto Malbec argentino" id="product1Image" class="changeable-image">
                        <!-- <input type="file" class="image-upload" id="product1Upload" accept="image/*"> -->
                    </div>
                    <div class="product-info">
                        <h4 contenteditable="true">Arepa de maíz</h4>
                        <p contenteditable="true">Sumérgete en una explosión de sabores...</p>
                    </div>
                </div>
                <div class="product" id="product-2">
                    <div class="image-container">
                        <img src="images/AREPA3.jpg" alt="Vino rosado Pinot Noir de Francia" id="product2Image" class="changeable-image">
                        <!-- <input type="file" class="image-upload" id="product2Upload" accept="image/*"> -->
                    </div>
                    <div class="product-info">
                        <h4 contenteditable="true">Arepa de maíz</h4>
                        <p contenteditable="true">Sumérgete en una explosión de sabores...</p>
                    </div>
                </div>
                <div class="product" id="product-3">
                    <div class="image-container">
                        <img src="images/AREPA3.jpg" alt="Vino espumoso Brut Cava" id="product3Image" class="changeable-image">
                        <!-- <input type="file" class="image-upload" id="product3Upload" accept="image/*"> -->
                    </div>
                    <div class="product-info">
                        <h4 contenteditable="true">Arepa de queso</h4>
                        <p contenteditable="true">Disfruta de esta increible arepa con mucho queso...</p>
                    </div>
                </div>
                <div class="product" id="product-4">
                    <div class="image-container">
                        <img src="images/AREPA5.jpg" alt="Vino rosado" id="product4Image" class="changeable-image">
                        <!-- <input type="file" class="image-upload" id="product4Upload" accept="image/*"> -->
                    </div>
                    <div class="product-info">
                        <h4 contenteditable="true">Arepa mixta de pollo</h4>
                        <p contenteditable="true">Disfruta de la frescura y la elegancia de esta arepa...</p>
                    </div>
                </div>
        
                <button id="add-product-btn" class="add-product-btn"><i class="fas fa-plus"></i> Agregar Producto</button>
            </section>
        
            <section class="description">
                <h3 contenteditable="true">Descripción</h3>
                <p contenteditable="true"><strong>AREPA PURO MAÍZ</strong> es una empresa apasionada por la elaboración de auténticas arepas 100% de maíz, que se dedica a preservar la tradición y el sabor casero de este emblemático alimento. En nuestro compromiso con la calidad y la autenticidad, nos enfocamos en ofrecer productos frescos y naturales, sin aditivos ni conservantes, asegurando así una experiencia culinaria que respeta y celebra las raíces culturales y gastronómicas de América Latina.</p>
                
                
        </div>
    </div>
</main>



  


<script>
//     document.getElementById('add-product-btn').addEventListener('click', function() {
//     // Clonar el producto plantilla
//     const newProduct = document.getElementById('product-template').cloneNode(true);
//     newProduct.style.display = 'block'; // Mostrar el nuevo producto
//     newProduct.id = 'product-' + (document.querySelectorAll('.product').length + 1); // Actualizar el ID

//     // Limpiar el contenido editable
//     newProduct.querySelector('h4').innerText = '';
//     newProduct.querySelector('p').innerText = '';

//     // Añadir el nuevo producto al final de la sección
//     document.querySelector('.products').insertBefore(newProduct, this);
// });
// // Función para cargar los productos desde localStorage
// function loadProducts() {
//     const products = JSON.parse(localStorage.getItem('products')) || [];
//     products.forEach(product => {
//         addProduct(product.name, product.description, product.image);
//     });
// }

// Función para agregar un nuevo producto
function addProduct(name, description, image) {
    const newProduct = document.getElementById('product-template').cloneNode(true);
    newProduct.style.display = 'block'; // Mostrar el nuevo producto
    newProduct.id = 'product-' + (document.querySelectorAll('.product').length + 1); // Actualizar el ID

    // Asignar los valores a los elementos
    newProduct.querySelector('h4').innerText = name;
    newProduct.querySelector('p').innerText = description;
    newProduct.querySelector('img').src = image;

    // Añadir el nuevo producto al final de la sección
    document.querySelector('.products').insertBefore(newProduct, document.querySelector('.add-product-form'));
}

// Manejar el evento del botón de agregar producto
document.getElementById('add-product-btn').addEventListener('click', function() {
    const productName = document.getElementById('product-name').value.trim();
    const productDescription = document.getElementById('product-description').value.trim();
    const productImage = document.getElementById('product-image-url').value.trim();

    if (productName && productDescription && productImage) {
        addProduct(productName, productDescription, productImage);
        saveProducts(); // Guardar en localStorage
        // Limpiar los campos del formulario
        document.getElementById('product-name').value = '';
        document.getElementById('product-description').value = '';
        document.getElementById('product-image-url').value = '';
    } else {
        alert('Por favor, complete todos los campos.');
    }
});

// Función para guardar los productos en localStorage
function saveProducts() {
    const products = [];
    document.querySelectorAll('.product').forEach(product => {
        const name = product.querySelector('h4').innerText;
        const description = product.querySelector('p').innerText;
        const image = product.querySelector('img').src;
        products.push({ name, description, image });
    });
    localStorage.setItem('products', JSON.stringify(products));
}




</script>
  <script>
 document.addEventListener('DOMContentLoaded', function() {
    const changeableImages = document.querySelectorAll('.changeable-image');

    changeableImages.forEach(img => {
        if (!img.closest('.profile-card')) {  // Excluir imágenes de perfil
            const container = img.closest('.image-container');
            const input = container.querySelector('.image-upload');

            container.addEventListener('click', function() {
                input.click();
            });

            input.addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        img.src = e.target.result;
                        // Guardar la imagen en localStorage
                        localStorage.setItem(img.id, e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
        }
    });

    // Cargar imágenes guardadas al cargar la página
    window.addEventListener('load', function() {
        changeableImages.forEach(img => {
            const savedImage = localStorage.getItem(img.id);
            if (savedImage) {
                img.src = savedImage;
            }
        });
    });
});
  </script>


<script>
  document.addEventListener('DOMContentLoaded', function() {
      // Function to handle image selection
      function handleImageSelection(callback) {
          const input = document.createElement('input');
          input.type = 'file';
          input.accept = 'image/*';
          input.onchange = e => {
              const file = e.target.files[0];
              if (file) {
                  const reader = new FileReader();
                  reader.onload = event => callback(event.target.result);
                  reader.readAsDataURL(file);
              }
          };
          input.click();
      }

      // Handle hero background
      const heroBackground = document.querySelector('.hero-background');
      heroBackground.addEventListener('click', () => {
          handleImageSelection(result => {
              heroBackground.querySelector('img').src = result;
              localStorage.setItem('heroBackground', result);
          });
      });

      // Handle hero logo
      const heroLogo = document.querySelector('.hero-logo');
      heroLogo.addEventListener('click', () => {
          handleImageSelection(result => {
              heroLogo.src = result;
              localStorage.setItem('heroLogo', result);
          });
      });

      // Handle product images
      document.querySelectorAll('.product .image-container').forEach(container => {
          container.addEventListener('click', () => {
              handleImageSelection(result => {
                  container.querySelector('img').src = result;
                  // Store in localStorage with unique identifier
                  localStorage.setItem(`product-${container.closest('.product').id}`, result);
              });
          });
      });

      // Add Product Form
      const addProductBtn = document.getElementById('add-product-btn');
      let previewImage = null;

      addProductBtn.addEventListener('click', () => {
          const formHTML = `
              <div class="add-product-form">
                  <h3>Agregar Nuevo Producto</h3>
                  <input type="text" id="product-name" placeholder="Nombre del producto" required>
                  <textarea id="product-description" placeholder="Descripción del producto" required></textarea>
                  <div class="image-preview-container" id="image-preview">
                      <span class="image-preview-text">Click para agregar imagen</span>
                  </div>
                  <button class="btn btn-primary" id="save-product">Guardar Producto</button>
                  <button class="btn btn-secondary" id="cancel-product">Cancelar</button>
              </div>
          `;

          addProductBtn.insertAdjacentHTML('beforebegin', formHTML);
          addProductBtn.style.display = 'none';

          const imagePreview = document.getElementById('image-preview');
          imagePreview.addEventListener('click', () => {
              handleImageSelection(result => {
                  previewImage = result;
                  imagePreview.innerHTML = `<img src="${result}" alt="Preview">`;
              });
          });

          document.getElementById('save-product').addEventListener('click', () => {
              const name = document.getElementById('product-name').value;
              const description = document.getElementById('product-description').value;

              if (name && description && previewImage) {
                  const productHTML = `
                      <div class="product" id="product-${Date.now()}">
                          <div class="image-container">
                              <img src="${previewImage}" alt="${name}" class="changeable-image">
                          </div>
                          <div class="product-info">
                              <h4 contenteditable="true">${name}</h4>
                              <p contenteditable="true">${description}</p>
                          </div>
                      </div>
                  `;

                  document.querySelector('.add-product-form').insertAdjacentHTML('beforebegin', productHTML);
                  document.querySelector('.add-product-form').remove();
                  addProductBtn.style.display = 'block';
              } else {
                  alert('Por favor complete todos los campos e incluya una imagen');
              }
          });

          document.getElementById('cancel-product').addEventListener('click', () => {
              document.querySelector('.add-product-form').remove();
              addProductBtn.style.display = 'block';
          });
      });

      // Load saved images on page load
    //   window.addEventListener('load', () => {
    //       const savedHeroBackground = localStorage.getItem('heroBackground');
    //       if (savedHeroBackground) {
    //           heroBackground.querySelector('img').src = savedHeroBackground;
    //       }

    //       const savedHeroLogo = localStorage.getItem('heroLogo');
    //       if (savedHeroLogo) {
    //           heroLogo.src = savedHeroLogo;
    //       }

    //       document.querySelectorAll('.product').forEach(product => {
    //           const savedImage = localStorage.getItem(`product-${product.id}`);
    //           if (savedImage) {
    //               product.querySelector('img').src = savedImage;
    //           }
    //       });
    //   });
  });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Obtener referencias a los elementos
        const changeBackgroundBtn = document.getElementById('changeBackgroundBtn');
        const heroBackgroundImage = document.querySelector('.hero-background img');
        
        // Función para manejar el cambio de imagen
        function handleImageChange() {
            // Crear input de tipo file
            const fileInput = document.createElement('input');
            fileInput.type = 'file';
            fileInput.accept = 'image/*';
            
            // Manejar la selección del archivo
            fileInput.onchange = function(e) {
                const file = e.target.files[0];
                
                if (file) {
                    const reader = new FileReader();
                    
                    reader.onload = function(event) {
                        // Actualizar la imagen
                        heroBackgroundImage.src = event.target.result;
                        
                        // Opcional: Guardar en localStorage
                        localStorage.setItem('heroBackground', event.target.result);
                        
                        // Mostrar mensaje de éxito
                        showNotification('Imagen actualizada con éxito');
                    };
                    
                    reader.readAsDataURL(file);
                }
            };
            
            // Activar el input file
            fileInput.click();
        }
        
        // Función para mostrar notificación
        function showNotification(message) {
            // Crear elemento de notificación
            const notification = document.createElement('div');
            notification.className = 'notification';
            notification.textContent = message;
            
            // Añadir estilos inline para la notificación
            notification.style.cssText = `
                position: fixed;
                bottom: 80px;
                right: 20px;
                background-color: #4CAF50;
                color: white;
                padding: 12px 24px;
                border-radius: 4px;
                z-index: 1000;
                animation: slideIn 0.3s ease-out;
            `;
            
            // Añadir la notificación al DOM
            document.body.appendChild(notification);
            
            // Remover la notificación después de 3 segundos
            setTimeout(() => {
                notification.style.animation = 'slideOut 0.3s ease-out';
                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 300);
            }, 3000);
        }
        
        // Añadir el evento click al botón
        changeBackgroundBtn.addEventListener('click', handleImageChange);
        
        // Añadir estilos de animación al documento
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideIn {
                from { transform: translateX(100%); opacity: 0; }
                to { transform: translateX(0); opacity: 1; }
            }
            
            @keyframes slideOut {
                from { transform: translateX(0); opacity: 1; }
                to { transform: translateX(100%); opacity: 0; }
            }
        `;
        document.head.appendChild(style);
    });
    </script>
    

    
</body>
</html>



