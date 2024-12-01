<?php

namespace App\Http\Controllers\Controllers_Sebas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
            'pic_profile' => 'nullable|string|max:255', // Ahora es un texto, no un archivo
            'email' => 'required|string|email|max:255|unique:users',
            'location' => 'required|string|max:255',
            'number' => 'required|string|max:255',
            'role' => 'required|in:entrepreneur,investor', // Asegura que el rol sea válido
        ]);

        // Preparación de los datos para enviar a la API
        $data = [
            'name' => $validated['name'],
            'lastname' => $validated['lastname'],
            'birth_date' => $validated['birth_date'],
            'password' => $validated['password'], // Contraseña
            'password_confirmation' => $request->input('password_confirmation'), // Confirmación de la contraseña
            'phone' => $validated['phone'],
            'image' => $validated['pic_profile'], // Cambiar 'image' para aceptar texto directamente
            'email' => $validated['email'],
            'location' => $validated['location'],
            'number' => $validated['number'],
            'role' => $validated['role'], // El rol
        ];

        try {
            // Enviar la solicitud POST a la API local para registrar al usuario
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])->post('https://apiemprendelink-production-9272.up.railway.app/api/auth/register', $data);

            // Comprobar si la respuesta fue exitosa
            if ($response->successful()) {
                // Redirigir al login si el registro es exitoso
                return redirect()->route('iniciar_sesion_usuario')
                    ->with('success', 'Usuario registrado con éxito. Ahora puedes iniciar sesión.');
            } else {
                // Si hubo errores, mostrarlos al usuario
                return back()->withErrors($response->json()['errors'] ?? ['Error al registrar el usuario.'])
                    ->withInput(); // Mantener los datos anteriores en el formulario
            }
        } catch (\Exception $e) {
            // Manejo de excepciones en caso de fallos de conexión o errores
            return back()->withErrors(['error' => 'No se pudo conectar con el servidor. ' . $e->getMessage()])
                ->withInput();
        }
    }
}
