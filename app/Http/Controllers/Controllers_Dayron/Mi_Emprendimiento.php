<?php

namespace App\Http\Controllers\Controllers_Dayron;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Mi_Emprendimiento extends Controller
{
    public function show($id)
    {
        // Consulta directa a la tabla publish_Entrepreneurships
        $emprendimiento = DB::table('publish_Entrepreneurships')
            ->where('id', $id)
            ->first();

        // Verificar si el emprendimiento existe
        if (!$emprendimiento) {
            return redirect()->route('home')->with('error', 'Emprendimiento no encontrado');
        }

        // Convertir campos JSON si es necesario
        if ($emprendimiento->product_images) {
            $emprendimiento->product_images = json_decode($emprendimiento->product_images, true);
        }
        if ($emprendimiento->product_descriptions) {
            $emprendimiento->product_descriptions = json_decode($emprendimiento->product_descriptions, true);
        }
        if ($emprendimiento->name_products) {
            $emprendimiento->name_products = json_decode($emprendimiento->name_products, true);
        }

        // Retorna la vista con los datos del emprendimiento
        return view('Views_Dayron.Mi_Emprendimiento', compact('emprendimiento'));
    }
}
