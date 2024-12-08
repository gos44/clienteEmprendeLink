<?php

namespace App\Http\Controllers\Controller_k;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ResenaInver extends Controller
{
    public function store(Request $request)
    {
        try {
            // Obtener todos los datos enviados
            $data = $request->all();

            // Loguear los datos recibidos para depuración
            Log::info('Datos recibidos para reseña:', $data);

            // Realizar la solicitud POST a la API externa con depuración completa
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ])->post(
                'https://apiemprendelink-production-9272.up.railway.app/api/review',
                $data
            );

            // Loguear la respuesta completa de la API
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

            // Si no fue exitosa, devolver detalles del error
            return response()->json([
                'success' => false,
                'message' => 'Error al enviar la reseña.',
                'error_details' => $response->body(),
                'status' => $response->status()
            ], 400);

        } catch (\Exception $e) {
            // Loguear cualquier excepción capturada
            Log::error('Excepción al enviar reseña:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Error interno: ' . $e->getMessage()
            ], 500);
        }
    }
}
