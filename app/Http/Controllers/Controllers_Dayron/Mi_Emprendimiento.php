<?php


namespace App\Http\Controllers\Controllers_Dayron;

use App\Http\Controllers\Controller;
use App\Models\Emprendimiento; // Asegúrate de que el modelo Emprendimiento esté correctamente importado
use Illuminate\Http\Request;

class Mi_Emprendimiento extends Controller
{
    public function show($id)
    {
        // Busca el emprendimiento por el ID
        $emprendimiento = Emprendimiento::find($id);

        if (!$emprendimiento) {
            return redirect()->route('home')->with('error', 'Emprendimiento no encontrado');
        }

        // Retorna la vista con los datos del emprendimiento
        return view('Views_Dayron.Mi_Emprendimiento', compact('emprendimiento'));
    }
}
