<?php

namespace App\Http\Controllers\Controller_k;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ResenaInver extends Controller
{
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

            // Agregar encabezados si es necesario
            $response = Http::asJson()->post(
                'https://apiemprendelink-production-9272.up.railway.app/api/review',
                $data
            );

            if ($response->successful()) {
                return redirect()->route('kevin.ReseñaInver')
                    ->with('success', 'Reseña creada exitosamente.');
            }

            // Loguear respuesta fallida
            \Log::error('Respuesta de la API al crear reseña:', [
                'status' => $response->status(),
                'body' => $response->body()
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
