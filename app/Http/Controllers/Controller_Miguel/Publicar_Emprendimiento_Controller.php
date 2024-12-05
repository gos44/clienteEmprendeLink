<?php
namespace App\Http\Controllers\Controller_Miguel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Cloudinary\Cloudinary;
use Cloudinary\Configuration\Configuration;

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
            'entrepreneurs_id' => 'required|integer|exists:users,id'
        ]);

        try {
            // Configurar Cloudinary
            $cloudinary = new Cloudinary(
                new Configuration([
                    'cloud' => [
                        'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                        'api_key' => env('CLOUDINARY_API_KEY'),
                        'api_secret' => env('CLOUDINARY_API_SECRET'),
                    ],
                ])
            );

            // Subir logo a Cloudinary
            $logoUpload = $cloudinary->uploadApi()->upload(
                $request->file('logo_path')->getRealPath(),
                ['folder' => 'emprendelink/logos']
            );
            $logoUrl = $logoUpload['secure_url'];

            // Subir imagen de fondo a Cloudinary
            $backgroundUpload = $cloudinary->uploadApi()->upload(
                $request->file('background')->getRealPath(),
                ['folder' => 'emprendelink/backgrounds']
            );
            $backgroundUrl = $backgroundUpload['secure_url'];

            // Subir imágenes de productos a Cloudinary
            $productImageUrls = [];
            if ($request->hasFile('product_images')) {
                foreach ($request->file('product_images') as $image) {
                    $productUpload = $cloudinary->uploadApi()->upload(
                        $image->getRealPath(),
                        ['folder' => 'emprendelink/products']
                    );
                    $productImageUrls[] = $productUpload['secure_url'];
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
