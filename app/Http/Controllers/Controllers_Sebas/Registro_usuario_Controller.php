<?php

namespace App\Http\Controllers\Controllers_Sebas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class Registro_usuario_Controller extends Controller
{
    public function index()
    {
        // Muestra el formulario de registro
        return view('Views_Sebas.registro_usuario');
    }

    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'password' => 'required|confirmed|min:8', // Asegura confirmación de contraseña
            'phone' => 'required|string|max:20',
            'pic_profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'email' => 'required|string|email|max:255|unique:users',
            'location' => 'required|string|max:255',
            'number' => 'required|string|max:255',
        ]);

        // Manejo de la imagen (si existe)
        $imagePath = null;
        if ($request->hasFile('pic_profile')) {
            $image = $request->file('pic_profile');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/profile_pics'), $imageName);
            $imagePath = 'uploads/profile_pics/' . $imageName;
        }

        // Preparación de los datos para enviar a la API
        $data = [
            'name' => $validated['name'],
            'lastname' => $validated['lastname'],
            'birth_date' => $validated['birth_date'],
            'password' => $validated['password'],
            'password_confirmation' => $request->input('password_confirmation'), // Añadido explícitamente
            'phone' => $validated['phone'],
            'image' => $imagePath,
            'email' => $validated['email'],
            'location' => $validated['location'],
            'number' => $validated['number'],
        ];

        try {
            // Enviar la solicitud POST a la API local
            $response = Http::withHeaders([
                'Accept' => 'application/json', // Asegura que se espera una respuesta JSON
                'Content-Type' => 'application/json',
            ])->post('http://127.0.0.1:8000/api/auth/register', $data);


            // Debugging: imprimir respuesta completa
            dd($response->json());

            // Si la API respondió correctamente, redirige con éxito
            if ($response->successful()) {
                return redirect()->route('registrar_nuevo_usuario')
                    ->with('success', 'Usuario registrado con éxito.');
            } else {
                // Si hubo un error con la API, muestra los errores
                return back()->withErrors($response->json()['errors'] ?? ['Error al registrar el usuario.'])
                    ->withInput();
            }
        } catch (\Exception $e) {
            // Manejo de excepciones (problemas de conexión, etc.)
            return back()->withErrors(['error' => 'No se pudo conectar con el servidor. ' . $e->getMessage()])
                ->withInput();
        }
    }

}
