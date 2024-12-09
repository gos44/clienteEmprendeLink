<?php

namespace App\Http\Controllers\Controller_k;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class ResenaInver extends Controller
{
    public function index(Request $request)
    {
        $reviews = [];
        $entrepreneurId = $request->input('entrepreneur_id');

        try {
            $url = 'https://apiemprendelink-production-9272.up.railway.app/api/review';
            if ($entrepreneurId) {
                $url .= '?entrepreneur_id=' . $entrepreneurId;
            }
            $response = Http::get($url);

            if ($response->successful()) {
                $reviews = $response->json();
            } else {
                Log::error('Error en la API: ' . $response->body());
            }
        } catch (\Exception $e) {
            Log::error('Error al obtener reseñas: ' . $e->getMessage());
            return back()->withErrors(['error' => 'No se pudieron cargar las reseñas.']);
        }

        return view('kevin.ReseñaInver', compact('reviews', 'entrepreneurId'));
    }

    public function store(Request $request)
{
    // Validar la entrada del usuario
    $validated = $request->validate([
        'entrepreneur_id' => 'required|integer',
        'investor_id' => 'required|integer',
        'comment' => 'required|string|max:500',
        'qualification' => 'required|integer|min:1|max:5',
    ]);

    try {
        // Crear los datos que se enviarán a la API
        $data = [
            'entrepreneur_id' => $validated['entrepreneur_id'],
            'investor_id' => $validated['investor_id'],
            'comment' => $validated['comment'],
            'qualification' => $validated['qualification'],
        ];

        // Hacer la solicitud POST a la API
        $response = Http::post('https://apiemprendelink-production-9272.up.railway.app/api/review', $data);

        if ($response->successful()) {
            // Si la reseña se crea correctamente
            $reviewData = $response->json();
            return redirect()->route('kevin.ReseñaInver')
                ->with('success', 'Reseña creada exitosamente.');
        } else {
            // Manejar errores específicos de la API
            $errorDetails = $response->json();
            return back()->withErrors($errorDetails['message'] ?? 'Error desconocido al crear la reseña')
                ->withInput();
        }
    } catch (\Exception $e) {
        // Manejar errores de conexión o excepciones
        return back()->withErrors(['error' => 'No se pudo conectar con la API: ' . $e->getMessage()])
            ->withInput();
    }
}
    }

