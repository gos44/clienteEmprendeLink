<?php
namespace App\Http\Controllers\Controllers_Gos;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;

class PerfilUserEditarController extends Controller 
{
    public function index($id)  // Añadir el parámetro $id
    {
        // Hacer la solicitud GET a la API para obtener un usuario específico por su ID
        $response = Http::get("apiemprendelink-production-9272.up.railway.app/api/Entrepreneurs/{$id}?included=user");
        
        // Si la respuesta es exitosa
        if ($response->successful()) {
            // Obtener los datos del cuerpo de la respuesta
            $connections = $response->json();
        } else {
            // En caso de error, inicializar el arreglo vacío
            $connections = [];
        }
        
        // Retorna la vista con los datos del emprendedor
        return view('Views_gos/EditarPerfilUsuario', compact('connections'));
    }
}