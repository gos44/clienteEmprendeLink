<?php

namespace App\Http\Controllers\Controllers_Dayron;

use App\Http\Controllers\Controller;
use App\Models\EntrepreneursList; // Importamos el modelo correcto
use Illuminate\Http\Request;

class Mi_Emprendimiento extends Controller
{
    public function show($id)
    {
        // Busca el emprendimiento por el ID
        $emprendimiento = EntrepreneursList::findOrFail($id);

        // Retorna la vista con los datos del emprendimiento
        return view('Views_Dayron.Mi_Emprendimiento', compact('emprendimiento'));
    }
}
