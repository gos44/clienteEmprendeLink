<?php

namespace App\Http\Controllers\Controllers_Sebas;

use App\Http\Controllers\Controller;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class Registro_usuario_Controller extends Controller
{
    /**
     * Muestra el formulario de registro.
     */
    public function index()
    {
        return view('Views_Sebas.registro_usuario');
    }

    /**
     * Almacena los datos del nuevo usuario y los envía a la API.
     */
    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'password' => 'required|confirmed|min:8', // Confirmación de contraseña
            'phone' => 'required|string|max:20',
            'image' =>  'required|image|mimes:jpeg,png,jpg|max:2048',
            'email' => 'required|string|email|max:255|unique:users',
            'location' => 'required|string|max:255',
            'number' => 'required|string|max:255',
            'role' => 'required|in:entrepreneur,investor', // Asegura que el rol sea válido
        ]);

        try {

            
            // Preparar datos para enviar a la API
            $data = [
                'name' => $validated['name'],
                'lastname' => $validated['lastname'],
                'birth_date' => $validated['birth_date'],
                'password' => $validated['password'],
                'password_confirmation' => $validated['password'],
                'phone' => $validated['phone'],
                'image' => $validated['image'], 
                'email' => $validated['email'],
                'location' => $validated['location'],
                'number' => $validated['number'],
                'role' => $validated['role'],
            ];
    
            // Enviar datos a la API
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])->post('https://apiemprendelink-production-9272.up.railway.app/api/auth/register', $data);
    
            if ($response->successful()) {
                return redirect()->route('iniciar_sesion_usuario.login')
                    ->with('success', 'Usuario registrado con éxito.');
            } else {
                return back()->withErrors($response->json()['errors'] ?? ['Error al registrar el usuario.'])
                    ->withInput();
            }
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'No se pudo conectar con el servidor. ' . $e->getMessage()])
                ->withInput();
        }
    }
}