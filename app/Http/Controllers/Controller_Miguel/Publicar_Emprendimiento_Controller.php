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
            'product_images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'name_products' => 'required|string',
            'product_descriptions' => 'required|string',
            'general_description' => 'required|string|max:2000',
        ]);

        try {
            // Guardar imágenes
            $logoPath = $request->file('logo_path')->store('public/logos');
            $backgroundPath = $request->file('background')->store('public/backgrounds');

            // Procesar imágenes de productos
            $productImages = [];
            if ($request->hasFile('product_images')) {
                foreach ($request->file('product_images') as $image) {
                    $productImages[] = $image->store('public/products');
                }
            }

            // Preparar datos para la API
            $entrepreneurshipData = [
                'name' => $request->input('name'),
                'slogan' => $request->input('slogan'),
                'category' => $request->input('category'),
                'logo_path' => Storage::url($logoPath),
                'background' => Storage::url($backgroundPath),
                'product_images' => array_map(function($path) {
                    return Storage::url($path);
                }, $productImages),
                'name_products' => array_filter(explode(',', $request->input('name_products'))),
                'product_descriptions' => array_filter(explode(',', $request->input('product_descriptions'))),
                'general_description' => $request->input('general_description')
            ];

            // Enviar a la API
            $response = Http::timeout(30)->post(
                'https://apiemprendelink-production-9272.up.railway.app/api/publicare', 
                $entrepreneurshipData
            );

            // Verificar respuesta
            if ($response->successful()) {
                return redirect()->route('MisEmpredimientos.index')
                    ->with('success', '¡Emprendimiento publicado con éxito!');
            } else {
                return back()
                    ->withErrors(['api_error' => 'Error al publicar: ' . $response->body()])
                    ->withInput();
            }

        } catch (\Exception $e) {
            return back()
                ->withErrors(['error' => 'Error interno: ' . $e->getMessage()])
                ->withInput();
        }
    }
}