<?php
namespace App\Http\Controllers\Controller_Miguel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

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
            'name_products' => 'required|string',
            'product_descriptions' => 'required|string',
            'general_description' => 'required|string|max:2000',
        ]);

        try {
            // Preparar datos de imágenes
            $logoPath = $request->file('logo_path')->store('images/logos', 'public');
            $backgroundPath = $request->file('background')->store('images/backgrounds', 'public');

            // Procesar múltiples imágenes de productos
            $productImagePaths = [];
            if ($request->hasFile('product_images')) {
                foreach ($request->file('product_images') as $productImage) {
                    $productImagePaths[] = $productImage->store('images/products', 'public');
                }
            }

            // Datos del emprendimiento
            $entrepreneurshipData = [
                'name' => $request->input('name'),
                'slogan' => $request->input('slogan'),
                'category' => $request->input('category'),
                'logo_path' => Storage::url($logoPath),
                'background' => Storage::url($backgroundPath),
                'product_images' => $productImagePaths,
                'name_products' => explode(',', $request->input('name_products')),
                'product_descriptions' => explode(',', $request->input('product_descriptions')),
                'general_description' => $request->input('general_description')
            ];

            // Enviar datos a la API
            $response = Http::post(
                'https://apiemprendelink-production-9272.up.railway.app/api/publicare', 
                $entrepreneurshipData
            );

            if (!$response->successful()) {
                return back()->withErrors($response->json('errors', ['Error al publicar el emprendimiento.']))
                    ->withInput();
            }

            return redirect()->route('MisEmpredimientos.index')
                ->with('success', '¡Emprendimiento publicado con éxito!');

        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'No se pudo conectar con el servidor: ' . $e->getMessage()])
                ->withInput();
        }
    }
}