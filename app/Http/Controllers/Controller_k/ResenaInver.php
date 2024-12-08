<?php

namespace App\Http\Controllers\Controller_k;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ResenaInver extends Controller
{
    /**
     * Lista todas las reseñas.
     */
    public function index()
    {
        try {
            // Llamada GET a la API para obtener las reseñas
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

    /**
     * Crea una nueva reseña.
     */
    public function store(Request $request)
    {
        // Validar los datos enviados desde el formulario
        $validated = $request->validate([
            'qualification' => 'required|integer|min:1|max:5', // Calificación entre 1 y 5
            'comment' => 'required|string|max:500',           // Comentario obligatorio
            'entrepreneur_id' => 'required|integer',          // ID del emprendedor
            'investor_id' => 'required|integer',              // ID del inversionista
        ]);

        try {
            // Preparar los datos para enviar a la API
            $data = [
                'qualification' => $validated['qualification'],
                'comment' => $validated['comment'],
                'entrepreneur_id' => $validated['entrepreneur_id'],
                'investor_id' => $validated['investor_id'],
            ];

            // Enviar los datos a la API
            $response = Http::post('https://apiemprendelink-production-9272.up.railway.app/api/review', $data);

            if ($response->successful()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Reseña creada exitosamente.',
                    'data' => $response->json(),
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al crear la reseña.',
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
