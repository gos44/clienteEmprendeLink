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
        // Validación de los campos
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
            // Preparar datos para enviar a la API
            $data = [
                'name' => $request->input('name'),
                'slogan' => $request->input('slogan'),
                'category' => $request->input('category'),
                'name_products' => array_filter(explode(',', $request->input('name_products'))),
                'product_descriptions' => array_filter(explode(',', $request->input('product_descriptions'))),
                'general_description' => $request->input('general_description'),
                'entrepreneurs_id' => $request->input('entrepreneurs_id')
            ];

            // Iniciar solicitud multipart
            $httpRequest = Http::asMultipart();

            // Adjuntar logo
            if ($request->hasFile('logo_path')) {
                $httpRequest->attach(
                    'logo_path', 
                    file_get_contents($request->file('logo_path')->getRealPath()),
                    $request->file('logo_path')->getClientOriginalName()
                );
            }

            // Adjuntar imagen de fondo
            if ($request->hasFile('background')) {
                $httpRequest->attach(
                    'background', 
                    file_get_contents($request->file('background')->getRealPath()),
                    $request->file('background')->getClientOriginalName()
                );
            }

            // Adjuntar imágenes de productos
            if ($request->hasFile('product_images')) {
                foreach ($request->file('product_images') as $index => $image) {
                    $httpRequest->attach(
                        'product_images[]', 
                        file_get_contents($image->getRealPath()),
                        $image->getClientOriginalName()
                    );
                }
            }

            // Enviar datos adicionales
            foreach ($data as $key => $value) {
                if (is_array($value)) {
                    // Manejar arrays
                    foreach ($value as $k => $v) {
                        $httpRequest->attach($key . '[' . $k . ']', $v);
                    }
                } else {
                    $httpRequest->attach($key, $value);
                }
            }

            // Enviar solicitud a la API
            $response = $httpRequest->post('https://apiemprendelink-production-9272.up.railway.app/api/publicare');

            // Verificar respuesta
            if ($response->successful()) {
                // Guardar archivos localmente (opcional)
                $logoPath = $request->file('logo_path')->store('public/logos');
                $backgroundPath = $request->file('background')->store('public/backgrounds');
                
                $productImages = [];
                if ($request->hasFile('product_images')) {
                    foreach ($request->file('product_images') as $image) {
                        $productImages[] = $image->store('public/products');
                    }
                }

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