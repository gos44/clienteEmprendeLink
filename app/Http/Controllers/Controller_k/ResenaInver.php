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
        try {
            // Llamada GET a la API para obtener las reseñas
            $response = Http::get('https://apiemprendelink-production-9272.up.railway.app/api/review');

            if ($response->successful()) {
                $reseñas = $response->json(); // Datos obtenidos de la API
                return view('kevin.ReseñaInver', ['reseñas' => $reseñas]); // Enviar a la vista
            } else {
                return view('kevin.ReseñaInver', [
                    'reseñas' => [],
                    'error' => 'No se pudieron obtener las reseñas.',
                ]);
            }
        } catch (\Exception $e) {
            return view('kevin.ReseñaInver', [
                'reseñas' => [],
                'error' => 'Error al conectarse con la API: ' . $e->getMessage(),
            ]);
        }
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
                return redirect()->route('resenaInver')
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
