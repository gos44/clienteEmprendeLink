<?php

namespace App\Http\Controllers\Controllers_Dayron;

use App\Http\Controllers\Controller;
use App\Models\Myentrepreneurship; // Asegúrate de que el modelo esté correctamente importado
use Illuminate\Http\Request;

class Mi_Emprendimiento extends Controller
{
    public function show($id)
    {
        // Busca el emprendimiento por el ID
        $emprendimiento = Myentrepreneurship::find($id);

        // Si no se encuentra el emprendimiento, redirige con un mensaje de error
        if (!$emprendimiento) {
            return redirect()->route('home')->with('error', 'Emprendimiento no encontrado');
        }

        // Retorna la vista con los datos del emprendimiento
        return view('Views_Dayron.Mi_Emprendimiento', compact('emprendimiento'));
    }
}
