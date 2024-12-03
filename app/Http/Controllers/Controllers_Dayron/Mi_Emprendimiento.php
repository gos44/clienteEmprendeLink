<?php

namespace App\Http\Controllers\Controllers_Dayron;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Mi_Emprendimiento extends Controller
{
    public function show($id)
    {
        // Consulta directa a la tabla
        $emprendimiento = DB::table('publish_Entrepreneurships')->where('id', $id)->first();

        // Si no se encuentra el emprendimiento, devuelve un mensaje
        if (!$emprendimiento) {
            return response()->json(['error' => 'Emprendimiento no encontrado'], 404);
        }

        // Devuelve el emprendimiento como JSON para verificar los datos
        return response()->json($emprendimiento);
    }
}
