<?php

namespace App\Http\Controllers\Controller_k;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ResenaInver extends Controller
{
    /**
     * Muestra la lista de reseñas en la vista.
     */
    public function index()
    {
        $reviews = [];

        try {
            // Llamada GET a la API para obtener reseñas
            $response = Http::get('https://apiemprendelink-production-9272.up.railway.app/api/review');

            if ($response->successful()) {
                $reviews = $response->json(); // Ajusta según la estructura JSON de la API
            } else {
                // Si la API responde con un error
                \Log::error('Error al obtener reseñas: ' . $response->status() . ' - ' . $response->body());
            }
        } catch (\Exception $e) {
            // Loguear el error de conexión
            \Log::error('Error al obtener reseñas: ' . $e->getMessage());
        }

        // Enviar las reseñas a la vista
        return view('kevin.ReseñaInver', compact('reviews'));
    }

    /**
     * Crea una nueva reseña.
     */
    public function store(Request $request)
    {
        // Validar los datos enviados desde el formulario
        $validated = $request->validate([
            'entrepreneur_id' => 'required|integer',
            'comment' => 'required|string|max:500',
            'qualification' => 'required|integer|min:1|max:5',
        ]);

        try {
            // Preparar los datos para enviar a la API
            $data = [
                'entrepreneur_id' => $validated['entrepreneur_id'],
                'comment' => $validated['comment'],
                'qualification' => $validated['qualification'],
            ];

            // Enviar los datos a la API
            $response = Http::post('https://apiemprendelink-production-9272.up.railway.app/api/review', $data);

            // Verificar si la API respondió exitosamente
            if ($response->successful()) {
                return redirect()->route('kevin.ReseñaInver')
                    ->with('success', 'Reseña creada exitosamente.');
            } else {
                // Mostrar respuesta completa en caso de error
                \Log::error('Error al crear la reseña: ' . $response->status() . ' - ' . $response->body());
                return back()->withErrors($response->json()['message'] ?? 'Error desconocido al crear la reseña')
                    ->withInput();
            }
        } catch (\Exception $e) {
            // Loguear el error de conexión o cualquier otro error
            \Log::error('No se pudo conectar con la API: ' . $e->getMessage());
            return back()->withErrors(['error' => 'No se pudo conectar con la API: ' . $e->getMessage()])
                ->withInput();
        }
    }
}
