<?php

namespace App\Http\Controllers\Controllers_Gos;

use Illuminate\Routing\Controller;

class PerfilUserEditarController extends Controller
{
    public function index()
    {
        // Simulación de datos que se pueden utilizar en la vista
        $connections = [
            // Ejemplo de datos
            ['name' => 'Connection 1', 'description' => 'Description of connection 1'],
            ['name' => 'Connection 2', 'description' => 'Description of connection 2']
        ];

        // Retorna la vista 'Perfil' con los datos de prueba
        return view('Views_gos/EditarPerfilUsuario', compact('connections'));
    // }}

    // // Configura el directorio de carga de archivos
    // $uploadDir = 'uploads/';

    // // Crea el directorio si no existe
    // if (!file_exists($uploadDir)) {
    //     mkdir($uploadDir, 0777, true);
    // }

    // // Procesar foto de perfil
    // if (isset($_FILES['profile_photo']) && $_FILES['profile_photo']['error'] === UPLOAD_ERR_OK) {
    //     $profilePhotoName = basename($_FILES['profile_photo']['name']);
    //     $profilePhotoPath = $uploadDir . $profilePhotoName;

    //     // Mueve la foto de perfil al directorio de carga
    //     move_uploaded_file($_FILES['profile_photo']['tmp_name'], $profilePhotoPath);
    // }

    // // Procesar certificado de inversión
    // if (isset($_FILES['investment_certificate_file']) && $_FILES['investment_certificate_file']['error'] === UPLOAD_ERR_OK) {
    //     $certificateName = basename($_FILES['investment_certificate_file']['name']);
    //     $certificatePath = $uploadDir . $certificateName;

    //     // Mueve el certificado al directorio de carga
    //     move_uploaded_file($_FILES['investment_certificate_file']['tmp_name'], $certificatePath);
    // }

    // // Procesar experiencia en inversión
    // if (isset($_FILES['investment_experience_file']) && $_FILES['investment_experience_file']['error'] === UPLOAD_ERR_OK) {
    //     $experienceName = basename($_FILES['investment_experience_file']['name']);
    //     $experiencePath = $uploadDir . $experienceName;

    //     // Mueve el archivo de experiencia al directorio de carga
    //     move_uploaded_file($_FILES['investment_experience_file']['tmp_name'], $experiencePath);
    // }

    // // Captura los datos del formulario
    // $name = $_POST['name'];
    // $birthdate = $_POST['birthdate'];
    // $email = $_POST['email'];
    // $location = $_POST['location'];
    // $phone = $_POST['phone'];
    // $gender = $_POST['gender'];
    // $document = $_POST['document'];

    // // Procesar datos (ejemplo: guardar en base de datos o mostrar en pantalla)
    // echo "<h2>Datos guardados correctamente:</h2>";
    // echo "<p>Nombre: $name</p>";
    // echo "<p>Fecha de Nacimiento: $birthdate</p>";
    // echo "<p>Correo: $email</p>";
    // echo "<p>Ubicación: $location</p>";
    // echo "<p>Celular: $phone</p>";
    // echo "<p>Género: $gender</p>";
    // echo "<p>Documento: $document</p>";

    // // Verifica las rutas de los archivos subidos
    // if (isset($profilePhotoPath)) {
    //     echo "<p>Foto de perfil: <a href='$profilePhotoPath'>Ver foto</a></p>";
    // }
    // if (isset($certificatePath)) {
    //     echo "<p>Certificado de Inversión: <a href='$certificatePath'>Ver certificado</a></p>";
    // }
    // if (isset($experiencePath)) {
    //     echo "<p>Experiencia en Inversión: <a href='$experiencePath'>Ver experiencia</a></p>";
    }}


