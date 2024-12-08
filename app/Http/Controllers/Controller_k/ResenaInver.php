<?php

namespace App\Http\Controllers\Controller_k;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ResenaInver extends Controller
{
    /**
     * Crea una nueva reseña.
     */
    public function store(Request $request)
    {
        // Validar los datos enviados desde el formulario
        $validated = $request->validate([
            'included' => 'required|string',
            'review_text' => 'required|string|max:500',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        try {
            // Preparar los datos para enviar a la API
            $data = [
                'included' => $validated['included'],
                'review_text' => $validated['review_text'],
                'rating' => $validated['rating'],
            ];

            // Enviar los datos a la API
            $response = Http::post('https://apiemprendelink-production-9272.up.railway.app/api/review', $data);

            // Verificar si la API respondió exitosamente
            if ($response->successful()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Reseña creada exitosamente.',
                    'data' => $response->json(),
                ]);
            } else {
                // Capturar el cuerpo de la respuesta de error
                return response()->json([
                    'success' => false,
                    'message' => 'Error al crear la reseña.',
                    'errors' => $response->json() ?? 'Error desconocido',
                ]);
            }
        } catch (\Exception $e) {
            // Manejar errores generales
            return response()->json([
                'success' => false,
                'message' => 'No se pudo conectar con la API.',
                'errors' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Muestra la lista de reseñas.
     */
    public function index()
    {
        try {
            // Llamada GET a la API para obtener reseñas
            $response = Http::get('https://apiemprendelink-production-9272.up.railway.app/api/review');

            if ($response->successful()) {
                return response()->json([
                    'success' => true,
                    'data' => $response->json(),
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al obtener las reseñas.',
                    'errors' => $response->json() ?? 'Error desconocido',
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'No se pudo conectar con la API.',
                'errors' => $e->getMessage(),
            ]);
        }
    }
}
