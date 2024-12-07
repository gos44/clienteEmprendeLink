<?php

namespace App\Http\Controllers\Controller_k;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ResenaInver extends Controller
{
    /**
     * Lista todas las reseñas desde la API.
     */
    public function index()
    {
        try {
            // Solicita las reseñas a la API
            $response = Http::get('https://apiemprendelink-production-9272.up.railway.app/api/reviews');

            // Verifica si la solicitud fue exitosa
            if ($response->successful()) {
                return response()->json([
                    'success' => true,
                    'data' => $response->json(),
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al obtener las reseñas',
                    'errors' => $response->json()['errors'] ?? 'Respuesta desconocida',
                ], 422);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'No se pudo conectar con el servidor',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Maneja la creación de una reseña.
     */
    public function store(Request $request)
    {
        // Validación de los datos recibidos
        $validated = $request->validate([
            'review' => 'required|string|max:255',
            'score' => 'required|numeric|min:1|max:5',
            'role' => 'required|string|in:entrepreneur,investor',
            'reviewable_id' => 'required|integer',
            'reviewable_type' => 'required|string|in:Entrepreneurship,Investor',
        ]);

        try {
            // Envía los datos a la API
            $response = Http::post(
                'https://apiemprendelink-production-9272.up.railway.app/api/review?included=entrepreneur,Entrepreneurship,investor',
                [
                    'review' => $validated['review'],
                    'score' => $validated['score'],
                    'role' => $validated['role'],
                    'reviewable_id' => $validated['reviewable_id'],
                    'reviewable_type' => $validated['reviewable_type'],
                ]
            );

            // Verifica la respuesta de la API
            if ($response->successful()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Reseña creada exitosamente',
                    'data' => $response->json(),
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al crear la reseña',
                    'errors' => $response->json()['errors'] ?? 'Respuesta desconocida',
                ], 422);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'No se pudo conectar con el servidor',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
