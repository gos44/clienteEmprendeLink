<?php

namespace App\Http\Controllers\Controller_k;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
class ResenaInver extends Controller
{
    private $apiUrl = 'https://apiemprendelink-production-9272.up.railway.app/api/review';

    // Método para publicar una reseña
    public function store(Request $request)
    {
        try {
            // Validar los datos de entrada
            $validatedData = $request->validate([
                'rating' => 'required|integer|min:1|max:5',
                'comment' => 'required|string|max:500',
                'entrepreneur_id' => 'nullable|integer', // Puede ser null
            ]);

            // Obtener el ID del inversionista desde el usuario autenticado
            $investor = Auth::user()->investor;

            if (!$investor) {
                return response()->json([
                    'success' => false,
                    'message' => 'No se encontró el perfil de inversionista.',
                ], 400);
            }

            // Crear los datos para enviar a la API
            $reviewData = [
                'qualification' => $validatedData['rating'],
                'comment' => $validatedData['comment'],
                'entrepreneur_id' => $validatedData['entrepreneur_id'] ?? null, // Opcional
                'investor_id' => $investor->id,
                'entrepreneurships_id' => null, // No necesario para esta operación
            ];

            // Enviar la reseña a la API
            $response = Http::post($this->apiUrl, $reviewData);

            // Verificar si la solicitud falló
            if ($response->failed()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al publicar la reseña.',
                    'details' => $response->json(),
                ], $response->status());
            }

            // Respuesta exitosa
            return response()->json([
                'success' => true,
                'message' => 'Reseña publicada exitosamente.',
                'review' => $response->json(),
            ]);
        } catch (\Exception $e) {
            // Manejar errores de validación u otros problemas
            return response()->json([
                'success' => false,
                'message' => 'Error al procesar la solicitud.',
                'details' => $e->getMessage(),
            ], 500);
        }
    }
}
