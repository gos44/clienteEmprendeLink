<?php

namespace App\Http\Controllers\Controller_k;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class ResenaInver extends Controller
{
    private $apiUrl = 'https://apiemprendelink-production-9272.up.railway.app/api/review';

    // Método para mostrar las reseñas
    public function index(Request $request)
    {
        try {
            // Obtén las reseñas desde la API
            $response = Http::get($this->apiUrl . '?included=entrepreneur,Entrepreneurship,investor');

            if ($response->failed()) {
                throw new \Exception('Error al obtener las reseñas desde la API.');
            }

            $reviews = $response->json() ?? [];

            // Obtén el entrepreneur_id desde el request o usa un valor predeterminado
            $entrepreneur_id = $request->query('entrepreneur_id', 1);

            return view('kevin.ReseñaInver', [
                'reviews' => $reviews,
                'entrepreneur_id' => $entrepreneur_id,
            ]);
        } catch (\Exception $e) {
            return view('kevin.ReseñaInver', [
                'reviews' => [],
                'error' => 'Error al cargar las reseñas: ' . $e->getMessage(),
            ]);
        }
    }

    // Método para almacenar una nueva reseña
    public function store(Request $request)
    {
        try {
            // Validar los datos de entrada
            $validatedData = $request->validate([
                'rating' => 'required|integer|min:1|max:5',
                'comment' => 'required|string|max:500',
                'entrepreneur_id' => 'nullable|integer', // Ahora es opcional
            ]);

            // Obtener el ID del inversionista desde el usuario autenticado (opcional)
            $investor = Auth::user()->investor;

            // Crear los datos para enviar a la API
            $reviewData = [
                'qualification' => $validatedData['rating'],
                'comment' => $validatedData['comment'],
                'entrepreneur_id' => $validatedData['entrepreneur_id'] ?? null, // Valor por defecto null
                'investor_id' => $investor->id ?? null, // Valor por defecto null si no está autenticado
                'entrepreneurships_id' => null, // O cualquier otro valor si es necesario
            ];

            // Enviar la reseña a la API
            $response = Http::post($this->apiUrl, $reviewData);

            if ($response->failed()) {
                throw new \Exception('Error al publicar la reseña.');
            }

            return response()->json([
                'success' => true,
                'message' => 'Reseña publicada exitosamente.',
                'review' => $response->json(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al procesar la solicitud: ' . $e->getMessage(),
            ], 500);
        }
    }
}
