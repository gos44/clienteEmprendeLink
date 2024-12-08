<?php

namespace App\Http\Controllers\Controller_k;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ResenaInver extends Controller
{
    /**
     * Muestra la vista con la lista de reseñas y el formulario para crear nuevas.
     */
    public function index()
    {
        // Obtenemos el ID del emprendedor (puede venir de la autenticación o ser fijo)
        $entrepreneur_id = 1; // Cambia este valor según sea necesario

        // Obtenemos las reseñas desde la API
        $reviews = []; // Aquí se deben cargar las reseñas existentes
        try {
            $response = Http::get('https://apiemprendelink-production-9272.up.railway.app/api/review');
            if ($response->successful()) {
                $reviews = $response->json('data') ?? [];
            }
        } catch (\Exception $e) {
            $reviews = [];
        }

        return view('kevin.ReseñaInver', compact('reviews', 'entrepreneur_id'));
    }

    /**
     * Crea una nueva reseña y redirige a la vista con la lista de reseñas actualizada.
     */
    public function store(Request $request)
    {
        // Validar los datos enviados desde el formulario
        $validated = $request->validate([
            'qualification' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:500',
            'entrepreneur_id' => 'required|integer',
            'investor_id' => 'required|integer',
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
                return redirect()->route('kevin.ReseñaInver')
                    ->with('success', 'Reseña creada exitosamente.');
            } else {
                return back()->withErrors($response->json()['errors'] ?? ['Error desconocido'])
                    ->withInput();
            }
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error al conectarse con la API: ' . $e->getMessage()])
                ->withInput();
        }
    }
}
