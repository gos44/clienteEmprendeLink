// // Crear un FormData para manejar los datos del formulario y archivos
// let currentForm = 1;
// const totalForms = 3;
// const formData = new FormData();

// // Función para guardar datos del primer formulario
// function saveForm1Data() {
//     formData.append('name', document.getElementById('nombre_emprendimiento').value);
//     formData.append('description', document.getElementById('descripcion').value);
//     formData.append('specifications', document.getElementById('especificaciones').value);
//     formData.append('category', document.getElementById('categoria').value);
// }

// // Función para guardar datos del segundo formulario
// function saveForm2Data() {
//     formData.append('logo', document.getElementById('logo').files[0]);
//     formData.append('cover', document.getElementById('portada').files[0]);
    
//     // Guardar productos
//     const products = [];
//     document.querySelectorAll('.product-item').forEach((item, index) => {
//         const productImage = item.querySelector('.product-image-input').files[0];
//         const productDescription = item.querySelector('textarea').value;
        
//         formData.append(`product_image_${index + 1}`, productImage);
//         formData.append(`product_description_${index + 1}`, productDescription);
//     });
// }

// // Función para guardar datos del tercer formulario y enviar
// async function saveForm3DataAndSubmit() {
//     formData.append('general_description', document.getElementById('especificaciones').value);
    
//     try {
//         const response = await fetch('/api/publish-entrepreneurship', {
//             method: 'POST',
//             body: formData,
//             headers: {
//                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
//             }
//         });

//         if (response.ok) {
//             // Mostrar el modal de éxito
//             document.getElementById('myModal').style.display = "block";
//         } else {
//             throw new Error('Error al publicar el emprendimiento');
//         }
//     } catch (error) {
//         console.error('Error:', error);
//         alert('Hubo un error al publicar el emprendimiento');
//     }
// }

// // Event listeners para los botones "Siguiente"
// document.querySelectorAll('.btn-publicar').forEach(button => {
//     button.addEventListener('click', async (e) => {
//         e.preventDefault();
        
//         if (currentForm === 1) {
//             saveForm1Data();
//             window.location.href = '/publicar-emprendimiento2';
//         } else if (currentForm === 2) {
//             saveForm2Data();
//             window.location.href = '/publicar-emprendimiento3';
//         } else if (currentForm === 3) {
//             await saveForm3DataAndSubmit();
//         }
//     });
// });