<?php

namespace App\Http\Controllers\Controllers_Dayron;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Para depuración

class Mi_Emprendimiento extends Controller
{
    public function show($id)
    {
        try {
            // Método 2: Usar el nombre completo del modelo
            $emprendimiento = \App\Models\publish_Entrepreneurships::findOrFail($id);

            // Retorna la vista con los datos del emprendimiento
            return view('Views_Dayron.Mi_Emprendimiento', compact('emprendimiento'));
        } catch (\Exception $e) {
            // Registro del error para depuración
            Log::error('Error al buscar emprendimiento: ' . $e->getMessage());

            // Redirigir con mensaje de error
            return redirect()->route('home')->with('error', 'No se pudo encontrar el emprendimiento');
        }
    }
}
