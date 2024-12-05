<?php
namespace App\Http\Controllers\Controllers_Sebas;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Busqueda_Filtro_UsuarioController extends Controller 
{
    public function index()
    {
        try {
            // Hacer la solicitud GET a la API
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ])->get('https://apiemprendelink-production-9272.up.railway.app/api/publicare');

            // Verificar si la solicitud fue exitosa
            if (!$response->successful()) {
                Log::error('Error en la API', [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);

                $publicaciones = [];
            } else {
                // Obtener los datos de la respuesta
                $publicaciones = $response->json();

                // Asegurar que las URLs de las imágenes sean accesibles
                $publicaciones = array_map(function($publicacion) {
                    // Usar URLs de fondo y logo si están disponibles
                    $publicacion['imagen_fondo'] = $publicacion['background'] ?? 'images/default-background.png';
                    $publicacion['logo'] = $publicacion['logo_path'] ?? 'images/default-logo.png';
                    
                    return $publicacion;
                }, $publicaciones);
            }

            // Retornar la vista con las publicaciones
            return view('Views_Sebas.Busqueda_Filtro_Usuario', compact('publicaciones'));

        } catch (\Exception $e) {
            // Capturar cualquier excepción
            Log::error('Excepción al obtener publicaciones', [
                'message' => $e->getMessage()
            ]);

            return view('Views_Sebas.Busqueda_Filtro_Usuario', [
                'publicaciones' => [],
                'error' => 'No se pudieron cargar las publicaciones'
            ]);
        }
    }
}