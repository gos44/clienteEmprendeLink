<?php  
namespace App\Http\Controllers\Controller_Miguel;  

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class Publicar_Emprendimiento extends Controller
{
    public function Publicar_Emprendimiento1()
    {
        // // Simulación de datos que se pueden utilizar en la vista
        // $connections = [
        //     // Ejemplo de datos
        //     ['name' => 'Connection 1', 'description' => 'Description of connection 1'],
        //     ['name' => 'Connection 2', 'description' => 'Description of connection 2']
        // ];

        // Retorna la vista 'Perfil' con los datos de prueba
        return view('Views_Miguel.Publicar_Emprendimiento1');
    }
    public function Publicar_Emprendimiento2()
    {
        // // Simulación de datos que se pueden utilizar en la vista
        // $connections = [
        //     // Ejemplo de datos
        //     ['name' => 'Connection 1', 'description' => 'Description of connection 1'],
        //     ['name' => 'Connection 2', 'description' => 'Description of connection 2']
        // ];

        // Retorna la vista 'Perfil' con los datos de prueba
        return view('Views_Miguel.Publicar_Emprendimiento2');
    }
    public function Publicar_Emprendimiento3()
    {
        // // Simulación de datos que se pueden utilizar en la vista
        // $connections = [
        //     // Ejemplo de datos
        //     ['name' => 'Connection 1', 'description' => 'Description of connection 1'],
        //     ['name' => 'Connection 2', 'description' => 'Description of connection 2']
        // ];

        // Retorna la vista 'Perfil' con los datos de prueba
        return view('Views_Miguel.Publicar_Emprendimiento3');
}
}
// class Publicar_Emprendimiento extends Controller 
// {
//     // <!-- FRONTEND -->
//     private $apiBaseUrl = 'http://api.EmprendeLink/api';

//     // Step 1: Basic Entrepreneurship Information View
//     public function Publicar_Emprendimiento1()
//     {     
//         return view('Views_Miguel.Publicar_Emprendimiento1');
//     }
    
//     // Step 2: Logo and Product Images View
//     public function Publicar_Emprendimiento2()
//     {     
//         // Check if basic entrepreneurship data exists in session
//         if (!session()->has('entrepreneurship.name')) {
//             return redirect()->route('Publicar_Emprendimiento1')
//                 ->with('error', 'Por favor, complete el paso 1 primero');
//         }
//         return view('Views_Miguel.Publicar_Emprendimiento2');
//     }
    
//     // Step 3: Final Details View
//     public function Publicar_Emprendimiento3()
//     {     
//         // Check if logo and product data exist in session
//         if (!session()->has('entrepreneurship.logo')) {
//             return redirect()->route('Publicar_Emprendimiento2')
//                 ->with('error', 'Por favor, complete el paso 2 primero');
//         }
//         return view('Views_Miguel.Publicar_Emprendimiento3');
//     }

//     // Handle Step 1 Form Submission
//     public function storeStep1(Request $request)
//     {
//         $validatedData = $request->validate([
//             'nombre_emprendimiento' => 'required|max:255',
//             'descripcion' => 'required',
//             'categoria' => 'required',
//             'especificaciones' => 'nullable'
//         ]);

//         // Store data in session for multi-step form
//         session([
//             'entrepreneurship.name' => $validatedData['nombre_emprendimiento'],
//             'entrepreneurship.description' => $validatedData['descripcion'],
//             'entrepreneurship.category' => $validatedData['categoria'],
//             'entrepreneurship.specifications' => $validatedData['especificaciones'] ?? ''
//         ]);

//         return redirect()->route('Publicar_Emprendimiento2');
//     }

//     // Handle Step 2 Form Submission
//     public function storeStep2(Request $request)
//     {
//         $validatedData = $request->validate([
//             'logo' => 'required|image|max:2048',
//             'portada' => 'required|image|max:2048',
//             'productos' => 'nullable',
//             'productos.*.image' => 'required|image|max:2048',
//             'productos.*.descripcion' => 'required'
//         ]);

//         // Store logo
//         $logoPath = $request->file('logo')->store('entrepreneurship/logos', 'public');
//         $coverPath = $request->file('portada')->store('entrepreneurship/covers', 'public');

//         // Store product images and descriptions
//         $productImages = [];
//         $productDescriptions = [];
//         foreach ($validatedData['productos'] as $index => $product) {
//             $imagePath = $product['image']->store('entrepreneurship/products', 'public');
//             $productImages[] = $imagePath;
//             $productDescriptions[] = $product['descripcion'];
//         }

//         // Store in session
//         session([
//             'entrepreneurship.logo' => $logoPath,
//             'entrepreneurship.cover' => $coverPath,
//             'entrepreneurship.product_image_1' => $productImages[0] ?? null,
//             'entrepreneurship.product_image_2' => $productImages[1] ?? null,
//             'entrepreneurship.product_image_3' => $productImages[2] ?? null,
//             'entrepreneurship.product_image_4' => $productImages[3] ?? null,
//             'entrepreneurship.product_description_1' => $productDescriptions[0] ?? null,
//             'entrepreneurship.product_description_2' => $productDescriptions[1] ?? null,
//             'entrepreneurship.product_description_3' => $productDescriptions[2] ?? null,
//             'entrepreneurship.product_description_4' => $productDescriptions[3] ?? null,
//         ]);

//         return redirect()->route('Publicar_Emprendimiento3');
//     }

//     // Final Step: Publish Entrepreneurship
//     public function store(Request $request)
//     {
//         $validatedData = $request->validate([
//             'general_description' => 'required',
//             'phone_number' => 'required|max:255',
//             'email' => 'required|email|max:255',
//             'location' => 'required|max:255',
//             'url' => 'nullable|max:255',
//             'expiration_date' => 'required|date'
//         ]);

//         try {
//             // Retrieve JWT token
//             $token = session('jwt_token') ?? request()->cookie('jwt_token');
            
//             if (!$token) {
//                 throw new \Exception('No authentication token found');
//             }

//             // Prepare multipart request with all entrepreneurship data
//             $response = Http::withToken($token)
//                 ->attach([
//                     'logo' => storage_path('app/public/' . session('entrepreneurship.logo')),
//                     'cover' => storage_path('app/public/' . session('entrepreneurship.cover')),
//                     'product_image_1' => storage_path('app/public/' . session('entrepreneurship.product_image_1')),
//                     'product_image_2' => storage_path('app/public/' . session('entrepreneurship.product_image_2')),
//                     'product_image_3' => storage_path('app/public/' . session('entrepreneurship.product_image_3')),
//                     'product_image_4' => storage_path('app/public/' . session('entrepreneurship.product_image_4')),
//                 ])
//                 ->post("{$this->apiBaseUrl}/publicare", [
//                     'name' => session('entrepreneurship.name'),
//                     'description' => session('entrepreneurship.description'),
//                     'category' => session('entrepreneurship.category'),
//                     'specifications' => session('entrepreneurship.specifications'),
//                     'product_description_1' => session('entrepreneurship.product_description_1'),
//                     'product_description_2' => session('entrepreneurship.product_description_2'),
//                     'product_description_3' => session('entrepreneurship.product_description_3'),
//                     'product_description_4' => session('entrepreneurship.product_description_4'),
//                     'general_description' => $validatedData['general_description'],
//                     'phone_number' => $validatedData['phone_number'],
//                     'email' => $validatedData['email'],
//                     'location' => $validatedData['location'],
//                     'url' => $validatedData['url'],
//                     'expiration_date' => $validatedData['expiration_date']
//                 ]);

//             if ($response->successful()) {
//                 // Clear session data after successful submission
//                 session()->forget('entrepreneurship');

//                 return redirect()->route('entrepreneurship.index')
//                     ->with('success', 'Emprendimiento publicado exitosamente');
//             } else {
//                 // Log API error
//                 Log::error('Publicación de emprendimiento fallida', [
//                     'response' => $response->body(),
//                     'status' => $response->status()
//                 ]);

//                 return redirect()->back()
//                     ->with('error', 'No se pudo publicar el emprendimiento');
//             }
//         } catch (\Exception $e) {
//             // Log unexpected errors
//             Log::error('Error en publicación de emprendimiento', [
//                 'message' => $e->getMessage(),
//                 'trace' => $e->getTraceAsString()
//             ]);

//             return redirect()->back()
//                 ->with('error', 'Ocurrió un error inesperado');
//         }
//     }
// }