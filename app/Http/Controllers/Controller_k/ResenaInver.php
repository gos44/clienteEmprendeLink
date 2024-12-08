<?php

namespace App\Http\Controllers\Controller_k;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ResenaInver extends Controller
{
    /**
     * Muestra la lista de reseñas en la vista.
     */
    public function index()
    {
        $reviews = [];

        try {
            // Llamada GET a la API para obtener las reseñas
            $response = Http::timeout(10)->get('https://apiemprendelink-production-9272.up.railway.app/api/review');

            if ($response->successful()) {
                $reviews = $response->json(); // Ajusta según la estructura JSON de la API
            }
        } catch (\Exception $e) {
            // Loguear errores
            Log::error('Error al obtener reseñas: ' . $e->getMessage());
        }

        // Retornar la vista con las reseñas
        return view('kevin.ReseñaInver', compact('reviews'));
    }

    /**
     * Crea una nueva reseña.
     */
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $validated = $request->validate([
            'entrepreneur_id' => 'nullable|integer',
            'comment' => 'required|string|max:500',
            'qualification' => 'required|integer|min:1|max:5',
        ]);

        // Preparar los datos para enviar
        $dataToSend = [
            'comment' => $validated['comment'],
            'qualification' => $validated['qualification'],
            'entrepreneur_id' => $validated['entrepreneur_id'] ?? null,
        ];

        try {
            // Realizar la solicitud POST a la API externa
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ])->timeout(10) // Agregar timeout
            ->post(
                'https://apiemprendelink-production-9272.up.railway.app/api/review',
                $dataToSend
            );

            // Imprimir respuesta completa para depuración
            Log::info('Respuesta de la API:', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            // Verificar si la solicitud fue exitosa
            if ($response->successful()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Reseña creada exitosamente',
                    'data' => $response->json()
                ]);
            }

            // Registrar errores si la solicitud no fue exitosa
            Log::error('Error al crear reseña:', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            // Devolver respuesta de error con más detalles
            return response()->json([
                'success' => false,
                'message' => 'Error al enviar la reseña. Detalles: ' . $response->body(),
                'status' => $response->status()
            ], $response->status());

        } catch (\Exception $e) {
            // Manejar errores de conexión
            Log::error('No se pudo conectar con la API:', [
                'exception' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Error de conexión: ' . $e->getMessage()
            ], 500);
        }
    }
}
