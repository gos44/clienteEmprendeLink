<?php

namespace App\Http\Controllers\Controller_k;

use App\Http\Controllers\Controller;
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
            // Llamada GET a la API para obtener las reseñas
            $response = Http::get('https://apiemprendelink-production-9272.up.railway.app/api/review');

            if ($response->successful()) {
                $reviews = $response->json(); // Ajusta según la estructura JSON de la API
            }
        } catch (\Exception $e) {
            // Loguear errores
            \Log::error('Error al obtener reseñas: ' . $e->getMessage());
        }

        // Retornar la vista con las reseñas
        return view('kevin.ReseñaInver', compact('reviews'));
    }

    /**
     * Crea una nueva reseña.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'entrepreneur_id' => 'required|integer',
            'comment' => 'required|string|max:500',
            'qualification' => 'required|integer|min:1|max:5',
        ]);

        try {
            $data = [
                'entrepreneur_id' => $validated['entrepreneur_id'],
                'comment' => $validated['comment'],
                'qualification' => $validated['qualification'],
            ];

            $response = Http::asJson()->post(
                'https://apiemprendelink-production-9272.up.railway.app/api/review',
                $data
            );
            dd($response->body());

            if ($response->successful()) {
                return redirect()->route('resenaInver')
                    ->with('success', 'Reseña creada exitosamente.');
            }

            \Log::error('Error al crear reseña:', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            return back()->withErrors(['error' => 'Error al enviar la reseña. Por favor, intenta nuevamente.'])
                ->withInput();

        } catch (\Exception $e) {
            \Log::error('No se pudo conectar con la API:', ['exception' => $e->getMessage()]);
            return back()->withErrors(['error' => 'No se pudo conectar con la API: ' . $e->getMessage()])
                ->withInput();
        }
    }
}
