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
            // Intentar la solicitud con más detalles
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ])->get('https://apiemprendelink-production-9272.up.railway.app/api/publicare');

            // Si hay un error en la respuesta
            if (!$response->successful()) {
                Log::error('Error en la API', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                    'headers' => $response->headers()
                ]);

                // Mostrar detalles del error
                return response()->json([
                    'error' => 'Error en la solicitud',
                    'status' => $response->status(),
                    'body' => $response->body()
                ], $response->status());
            }

            // Obtener los datos
            $publicaciones = $response->json();

            // Si no hay datos
            if (empty($publicaciones)) {
                return response()->json(['message' => 'No se encontraron publicaciones']);
            }

            // Retornar vista o JSON según necesites
            return view('Views_Sebas.Busqueda_Filtro_Usuario', compact('publicaciones'));

        } catch (\Exception $e) {
            // Capturar cualquier excepción
            Log::error('Excepción al obtener publicaciones', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'error' => 'Error interno del servidor',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}