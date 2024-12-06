<?php

namespace App\Http\Controllers\Controller_Miguel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;


class Publicar_Emprendimiento_Controller extends Controller
{
    public function index()
    {
        return view('views_Miguel.Publicar_Emprendimiento1');
    }

    public function guardarEmprendimiento(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'slogan' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'logo_path' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'background' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'product_images.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'name_products' => 'required|array',
        'product_descriptions' => 'required|array',
        'general_description' => 'required|string|max:2000',
    ]);

    try {
        $userId = auth()->id();

        // Preparar datos para la solicitud
        $data = [
            'name' => $request->input('name'),
            'slogan' => $request->input('slogan'),
            'category' => $request->input('category'),
            'name_products' => $request->input('name_products'),
            'product_descriptions' => $request->input('product_descriptions'),
            'general_description' => $request->input('general_description'),
            'entrepreneurs_id' => $userId,
        ];

        // Preparar solicitud multipart
 // Iniciar solicitud multipart
 $httpRequest = Http::asMultipart();

 // Procesar logo
 if ($request->hasFile('logo_path')) {
     $logoFile = $request->file('logo_path');
     $httpRequest->attach('logo_path', file_get_contents($logoFile), $logoFile->getClientOriginalName(), [
         'Content-Type' => $logoFile->getMimeType()
     ]);
 }

 // Procesar imagen de fondo
 if ($request->hasFile('background')) {
     $backgroundFile = $request->file('background');
     $httpRequest->attach('background', file_get_contents($backgroundFile), $backgroundFile->getClientOriginalName(), [
         'Content-Type' => $backgroundFile->getMimeType()
     ]);
 }

 // Procesar imágenes de productos
 if ($request->hasFile('product_images')) {
     foreach ($request->file('product_images') as $index => $productImage) {
         $httpRequest->attach("product_images[$index]", file_get_contents($productImage), $productImage->getClientOriginalName(), [
             'Content-Type' => $productImage->getMimeType()
         ]);
     }
 }

 // Adjuntar datos adicionales
 foreach ($data as $key => $value) {
     if (is_array($value)) {
         foreach ($value as $k => $v) {
             $httpRequest->attach("{$key}[{$k}]", $v);
         }
     } else {
         $httpRequest->attach($key, $value);
     }
 }

 // Enviar solicitud a la API
 $response = $httpRequest->post('https://apiemprendelink-production-9272.up.railway.app/api/publicare');

 // Manejar respuesta
 if ($response->successful()) {
     return redirect()->route('MisEmpredimientos.index')
         ->with('success', '¡Emprendimiento publicado con éxito!');
 } else {
     Log::error('API Error Details: ', [
         'status' => $response->status(),
         'body' => $response->body()
     ]);

     return back()
         ->withErrors(['api_error' => 'Error al publicar: ' . $response->body()])
         ->withInput();
 }
} catch (\Exception $e) {
 Log::error('Error interno en la publicación del emprendimiento: ', [
     'message' => $e->getMessage(),
     'trace' => $e->getTraceAsString()
 ]);

 return back()
     ->withErrors(['error' => 'Error interno: ' . $e->getMessage()])
     ->withInput();
}
}
}

