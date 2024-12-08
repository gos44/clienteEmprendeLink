<?php

namespace App\Http\Controllers\Controller_k;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

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
            $response = Http::get('https://apiemprendelink-production-9272.up.railway.app/api/review');

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
            'entrepreneur_id' => 'required|integer',
            'comment' => 'required|string|max:500',
            'qualification' => 'required|integer|min:1|max:5',
        ]);

        try {
            // Realizar la solicitud POST a la API externa
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ])->post(
                'https://apiemprendelink-production-9272.up.railway.app/api/review',
                $validated
            );

            // Verificar si la solicitud fue exitosa
            if ($response->successful()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Reseña creada exitosamente'
                ]);
            }

            // Registrar errores si la solicitud no fue exitosa
            Log::error('Error al crear reseña:', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            // Devolver respuesta de error
            return response()->json([
                'success' => false,
                'message' => 'Error al enviar la reseña. Por favor, intenta nuevamente.'
            ], 400);

        } catch (\Exception $e) {
            // Manejar errores de conexión
            Log::error('No se pudo conectar con la API:', ['exception' => $e->getMessage()]);

            return response()->json([
                'success' => false,
                'message' => 'No se pudo conectar con la API: ' . $e->getMessage()
            ], 500);
        }
    }
}
