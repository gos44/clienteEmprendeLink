<?php

namespace App\Http\Controllers\Controllers_Gos;

use Illuminate\Support\Facades\Http;
use Illuminate\Routing\Controller;

class PerfilUsuarioController extends Controller
{
    public function index($id)  // El parámetro $id es necesario para identificar al usuario
    {
        // Hacer la solicitud GET a la API para obtener un usuario específico por su ID
        $response = Http::get("https://apiemprendelink-production-9272.up.railway.app/api/Entrepreneurs/{$id}?included=user");
        
        // Verificar si la respuesta es exitosa
        if ($response->successful()) {
            // Extraer los datos del cuerpo de la respuesta
            $data = $response->json();

            // Asegúrate de que `connections` coincida con la estructura de la API
            $connections = $data['data'] ?? [];
        } else {
            // Manejar errores y asignar un arreglo vacío
            $connections = [];
        }

        // Retornar la vista con los datos
        return view('Views_gos.PerfilUsuario', compact('connections'));
    }
}
