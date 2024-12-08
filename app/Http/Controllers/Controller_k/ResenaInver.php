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
    public function store(Request $request)
{
    // Modify validation to make entrepreneur_id optional
    $validated = $request->validate([
        'entrepreneur_id' => 'nullable|integer',
        'comment' => 'required|string|max:500',
        'qualification' => 'required|integer|min:1|max:5',
    ]);

    try {
        // Prepare data, allowing entrepreneur_id to be null
        $data = [
            'comment' => $validated['comment'],
            'qualification' => $validated['qualification'],
        ];

        // Only add entrepreneur_id if it's provided
        if (!empty($validated['entrepreneur_id'])) {
            $data['entrepreneur_id'] = $validated['entrepreneur_id'];
        }

        // Send data to API
        $response = Http::post('https://apiemprendelink-production-9272.up.railway.app/api/review', $data);

        if ($response->successful()) {
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
