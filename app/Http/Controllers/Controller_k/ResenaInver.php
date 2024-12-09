<?php
namespace App\Http\Controllers\Controller_k;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class ResenaInver extends Controller
{
    /**
     * Muestra la lista de reseñas en la vista.
     */
    public function index(Request $request)
    {
        $reviews = [];
        $entrepreneurId = $request->input('entrepreneur_id');

        try {
            // Llamada GET con filtro opcional
            $url = 'https://apiemprendelink-production-9272.up.railway.app/api/review';
            if ($entrepreneurId) {
                $url .= '?entrepreneur_id=' . $entrepreneurId;
            }

            $response = Http::get($url);

            if ($response->successful()) {
                $reviews = $response->json();
            }
        } catch (\Exception $e) {
            Log::error('Error al obtener reseñas: ' . $e->getMessage());
        }

        return view('kevin.ReseñaInver', compact('reviews', 'entrepreneurId'));
    }

    /**
     * Crea una nueva reseña.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'entrepreneur_id' => 'required|integer',
            'investor_id' => 'required|integer',
            'comment' => 'required|string|max:500',
            'qualification' => 'required|integer|min:1|max:5',
        ]);
    
        try {
            $data = [
                'entrepreneur_id' => $validated['entrepreneur_id'],
                'investor_id' => $validated['investor_id'],
                'comment' => $validated['comment'],
                'qualification' => $validated['qualification'],
            ];
    
            $response = Http::post('https://apiemprendelink-production-9272.up.railway.app/api/review', $data);
    
            if ($response->successful()) {
                $reviewData = $response->json();
                return redirect()->route('kevin.ReseñaInver')
                    ->with('success', 'Reseña creada exitosamente.');
            } else {
                return back()->withErrors($response->json()['message'] ?? 'Error desconocido al crear la reseña')
                    ->withInput();
            }
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'No se pudo conectar con la API: ' . $e->getMessage()])
                ->withInput();
        }
    }
}