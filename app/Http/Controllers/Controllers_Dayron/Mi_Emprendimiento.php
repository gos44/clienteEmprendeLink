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

    // Si no se encuentra el emprendimiento, redirige con un mensaje de error
    if (!$emprendimiento) {
        return redirect()->route('home')->with('error', 'Emprendimiento no encontrado');
    }

    // Convertir campos JSON en arreglos
    $emprendimiento->name_products = json_decode($emprendimiento->name_products, true);
    $emprendimiento->product_images = json_decode($emprendimiento->product_images, true);
    $emprendimiento->product_descriptions = json_decode($emprendimiento->product_descriptions, true);

    // Retorna la vista con los datos del emprendimiento
    return view('Views_Dayron.Mi_Emprendimiento', compact('emprendimiento'));
}
}
