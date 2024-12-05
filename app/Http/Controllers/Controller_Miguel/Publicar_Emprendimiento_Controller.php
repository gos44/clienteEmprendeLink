<?php
namespace App\Http\Controllers\Controller_Miguel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Log;

class Publicar_Emprendimiento_Controller extends Controller
{
    public function guardarEmprendimiento(Request $request)
    {
        // Validación de datos
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
            'entrepreneurs_id' => 'required|integer'
        ]);

        try {
            // Log para verificar configuración de Cloudinary
            Log::info('Cloudinary Config', [
                'cloud_name' => config('cloudinary.cloud_name'),
                'api_key' => config('cloudinary.api_key'),
            ]);

            // Subir logo a Cloudinary
            $logoUpload = Cloudinary::upload(
                $request->file('logo_path')->getRealPath(),
                ['folder' => 'emprendelink/logos']
            );
            $logoUrl = $logoUpload->getSecurePath();

            // Subir imagen de fondo a Cloudinary
            $backgroundUpload = Cloudinary::upload(
                $request->file('background')->getRealPath(),
                ['folder' => 'emprendelink/backgrounds']
            );
            $backgroundUrl = $backgroundUpload->getSecurePath();

            // Subir imágenes de productos a Cloudinary
            $productImageUrls = [];
            if ($request->hasFile('product_images')) {
                foreach ($request->file('product_images') as $image) {
                    $productUpload = Cloudinary::upload(
                        $image->getRealPath(),
                        ['folder' => 'emprendelink/products']
                    );
                    $productImageUrls[] = $productUpload->getSecurePath();
                }
            }

            // Preparar datos para la API
            $entrepreneurshipData = [
                'name' => $request->input('name'),
                'slogan' => $request->input('slogan'),
                'category' => $request->input('category'),
                'logo_path' => $logoUrl,
                'background' => $backgroundUrl,
                'product_images' => $productImageUrls,
                'name_products' => array_filter(explode(',', $request->input('name_products'))),
                'product_descriptions' => array_filter(explode(',', $request->input('product_descriptions'))),
                'general_description' => $request->input('general_description'),
                'entrepreneurs_id' => $request->input('entrepreneurs_id')
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
                // Log del error de la API
                Log::error('API Error', [
                    'response' => $response->body(),
                    'status' => $response->status()
                ]);

                return back()
                    ->withErrors(['api_error' => 'Error al publicar: ' . $response->body()])
                    ->withInput();
            }

        } catch (\Exception $e) {
            // Log del error interno
            Log::error('Internal Error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return back()
                ->withErrors(['error' => 'Error interno: ' . $e->getMessage()])
                ->withInput();
        }
    }
}
