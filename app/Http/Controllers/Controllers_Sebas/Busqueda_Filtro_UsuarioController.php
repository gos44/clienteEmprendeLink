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
            if ($response->successful()) {
                // Obtener los datos de la respuesta
                $data = $response->json('data');

                // Asegurar que las URLs de las imágenes sean accesibles
                $publicaciones = array_map(function($item) {
                    $item['imagen_fondo'] = $item['background'];
                    $item['logo'] = $item['logo_path'];
                    return $item;
                }, $data);
            } else {
                // En caso de error, inicializar el arreglo vacío
                $publicaciones = [];

                // Opcional: registrar el error
                Log::error('Error al obtener publicaciones', [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);
            }

            // Retornar la vista con las publicaciones
            return view('Views_Sebas.Busqueda_Filtro_Usuario', compact('publicaciones'));
        } catch (\Exception $e) {
            // Capturar cualquier excepción
            Log::error('Excepción al obtener publicaciones', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            // Retornar la vista con un mensaje de error
            return view('Views_Sebas.Busqueda_Filtro_Usuario', [
                'publicaciones' => [],
                'error' => 'No se pudieron cargar las publicaciones'
            ]);
        }
    }
}