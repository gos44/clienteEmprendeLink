
@extends('layouts.Nav-Bar_Usuario')
@extends('layouts.Footer_Usuario')


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
                <img src="images/FONDO-VINOS.png" alt="Mercado de Vinos" data-image="hero-background" id="heroBackground" class="changeable-image">
                <input type="file" class="image-upload" id="heroBackgroundUpload" accept="image/*">
            </div>
            <div class="hero-overlay"></div>
            <div class="hero-content">
                <div class="hero-main">
                    <div class="image-container">
                        <img src="images/LOGO-VINOS.png" alt="Mercado de Vinos Logo" class="hero-logo changeable-image" id="heroLogo">
                        <!-- <input type="file" class="image-upload" id="heroLogoUpload" accept="image/*"> -->
                    </div>
                    <h1 contenteditable="true">Vino el Éxtasis</h1>
                    <p class="hero-quote" contenteditable="true">"Aquel que vino al mundo y no toma vino, ¿entonces a qué vino?"</p>
                </div>
                <div class="hero-buttons">
                    <a href="ListaMisEmprendiientos.html" class="btn btn-primary" onclick="saveChanges()">Guardar</a>
                    <a href="MI-EMPRENDIMIENTO-EDITAR-2.HTML" class="btn btn-secondary">Eliminar</a>
                </div>
            </div>
        </section>

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
                        <img src="" alt="" class="changeable-image">
                        <input type="file" class="image-upload" accept="image/*">
                    </div>
                    <div class="product-info">
                        <h4 contenteditable="true"></h4>
                        <p contenteditable="true"></p>
                    </div>
                </div>
        
                <div class="product" id="product-1">
                    <div class="image-container">
                        <img src="https://cdn.pixabay.com/photo/2017/06/27/14/37/wines-2447514_1280.jpg" alt="Vino tinto Malbec argentino" id="product1Image" class="changeable-image">
                        <!-- <input type="file" class="image-upload" id="product1Upload" accept="image/*"> -->
                    </div>
                    <div class="product-info">
                        <h4 contenteditable="true">Vino tinto Malbec argentino</h4>
                        <p contenteditable="true">Intenso y robusto, con notas de frutas negras y un toque de vainilla. Perfecto para acompañar carnes rojas.</p>
                    </div>
                </div>
                <div class="product" id="product-2">
                    <div class="image-container">
                        <img src="https://cdn.pixabay.com/photo/2020/04/09/15/54/wines-5022033_1280.png" alt="Vino rosado Pinot Noir de Francia" id="product2Image" class="changeable-image">
                        <!-- <input type="file" class="image-upload" id="product2Upload" accept="image/*"> -->
                    </div>
                    <div class="product-info">
                        <h4 contenteditable="true">Vino rosado Pinot Noir de Francia</h4>
                        <p contenteditable="true">Delicado y fresco, con aromas de fresas y un final cítrico. Ideal para tardes de verano y platos ligeros.</p>
                    </div>
                </div>
                <div class="product" id="product-3">
                    <div class="image-container">
                        <img src="https://cdn.pixabay.com/photo/2020/02/02/15/07/wine-4813260_1280.jpg" alt="Vino espumoso Brut Cava" id="product3Image" class="changeable-image">
                        <!-- <input type="file" class="image-upload" id="product3Upload" accept="image/*"> -->
                    </div>
                    <div class="product-info">
                        <h4 contenteditable="true">Vino espumoso Brut Cava</h4>
                        <p contenteditable="true">Burbujeante y elegante, con notas de manzana verde y pan tostado. Perfecto para celebraciones y aperitivos.</p>
                    </div>
                </div>
                <div class="product" id="product-4">
                    <div class="image-container">
                        <img src="https://cdn.pixabay.com/photo/2016/07/26/16/16/wine-1543170_1280.jpg" alt="Vino rosado" id="product4Image" class="changeable-image">
                        <!-- <input type="file" class="image-upload" id="product4Upload" accept="image/*"> -->
                    </div>
                    <div class="product-info">
                        <h4 contenteditable="true">Vino rosado Provenzal</h4>
                        <p contenteditable="true">Suave y aromático, con toques de melocotón y flores blancas. Excelente acompañante para mariscos y ensaladas.</p>
                    </div>
                </div>
        
                <button id="add-product-btn" class="add-product-btn"><i class="fas fa-plus"></i> Agregar Producto</button>
            </section>
        
            <section class="description">
                <h3 contenteditable="true">Descripción</h3>
                    <p contenteditable="true">Experimenta la magia del vino: Un viaje sensorial único. Imagina un atardecer en el viñedo, donde los rayos dorados del sol acarician las vides maduras, listas para ser cosechadas. Cada botella de vino que elaboramos es el resultado de este mágico proceso, donde la tierra, el clima y la pasión de nuestros enólogos se combinan para crear una obra de arte líquida. Más que una bebida, una pasión: Embárcate en un viaje sensorial sin igual donde cada gota te invita a descubrir un universo de sabores, aromas y tradición. Desde la frescura frutal de un vino joven hasta la complejidad y profundidad de un añejo, cada sorbo es una nueva experiencia. Un legado familiar: Sumérgete en la historia que cada botella cuenta, un relato de tradición familiar, innovación y dedicación inquebrantable. Nuestra bodega ha sido testigo de generaciones que han dedicado sus vidas a perfeccionar su arte.</p>

            </section>
          
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
// function saveProducts() {
//     const products = [];
//     document.querySelectorAll('.product').forEach(product => {
//         const name = product.querySelector('h4').innerText;
//         const description = product.querySelector('p').innerText;
//         const image = product.querySelector('img').src;
//         products.push({ name, description, image });
//     });
//     localStorage.setItem('products', JSON.stringify(products));
// }




</script>
  <script>
//  document.addEventListener('DOMContentLoaded', function() {
//     const changeableImages = document.querySelectorAll('.changeable-image');

//     changeableImages.forEach(img => {
//         if (!img.closest('.profile-card')) {  // Excluir imágenes de perfil
//             const container = img.closest('.image-container');
//             const input = container.querySelector('.image-upload');

//             container.addEventListener('click', function() {
//                 input.click();
//             });

//             input.addEventListener('change', function(event) {
//                 const file = event.target.files[0];
//                 if (file) {
//                     const reader = new FileReader();
//                     reader.onload = function(e) {
//                         img.src = e.target.result;
//                         // Guardar la imagen en localStorage
//                         localStorage.setItem(img.id, e.target.result);
//                     };
//                     reader.readAsDataURL(file);
//                 }
//             });
//         }
//     });

    // Cargar imágenes guardadas al cargar la página
    // window.addEventListener('load', function() {
    //     changeableImages.forEach(img => {
    //         const savedImage = localStorage.getItem(img.id);
    //         if (savedImage) {
    //             img.src = savedImage;
    //         }
    //     });
    // });
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





    
</body>
</html>



