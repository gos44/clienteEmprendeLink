<?php

namespace App\Http\Controllers\Controller_k;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class ResenaInver extends Controller
{
    public function store(Request $request)
    {
        // Validación de datos
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5', // Calificación entre 1 y 5
            'comment' => 'required|string|max:500',    // Comentario requerido
            'entrepreneur_id' => 'nullable|integer',  // ID del emprendedor (opcional)
        ]);

        try {
            // Construir los datos a enviar
            $data = [
                'qualification' => $validated['rating'],
                'comment' => $validated['comment'],
                'entrepreneur_id' => $validated['entrepreneur_id'], // Puede ser null
                'investor_id' => auth()->user()->investor->id ?? null, // Obtener el ID del inversionista autenticado
            ];

            // Enviar solicitud POST a la API con el parámetro `included`
            $response = Http::post(
                'https://apiemprendelink-production-9272.up.railway.app/api/review?included=entrepreneur,Entrepreneurship,investor',
                $data
            );

            // Evaluar respuesta de la API
            if ($response->successful()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Reseña publicada exitosamente.',
                    'data' => $response->json(), // Incluir la respuesta completa de la API
                ], 201);
            }

            // En caso de error, devolver el mensaje recibido por la API
            return response()->json([
                'success' => false,
                'message' => 'Error al publicar la reseña.',
                'errors' => $response->json()['errors'] ?? $response->body(),
            ], $response->status());
        } catch (\Exception $e) {
            // Manejo de errores generales
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al intentar procesar la solicitud.',
                'details' => $e->getMessage(),
            ], 500);
        }
    }
}
