<?php
namespace App\Http\Controllers\Controllers_Sebas;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log; // Añade esta línea para importar Log

class Busqueda_Filtro_UsuarioController extends Controller 
{
    public function index()
    {
        // Hacer la solicitud GET a la API
        $response = Http::get('https://apiemprendelink-production-9272.up.railway.app/api/publicare');

        // Verificar si la solicitud fue exitosa
        if ($response->successful()) {
            // Obtener los datos de la respuesta
            $publicaciones = $response->json();
        } else {
            // En caso de error, inicializar el arreglo vacío
            $publicaciones = [];
            
            // Opcional: puedes añadir un mensaje de error
            Log::error('Error al obtener publicaciones', [
                'status' => $response->status(),
                'body' => $response->body()
            ]);
        }

        // Retornar la vista con las publicaciones
        return view('Views_Sebas.Busqueda_Filtro_Usuario', compact('publicaciones'));
    }
}