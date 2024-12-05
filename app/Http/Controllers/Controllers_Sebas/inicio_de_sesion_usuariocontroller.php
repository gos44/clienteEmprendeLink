<?php

namespace App\Http\Controllers\Controllers_Sebas;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class inicio_de_sesion_usuariocontroller extends Controller
{
    public function index()
    {
        // Mantenemos la vista que ya funciona
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validar los datos de entrada incluyendo el rol
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'role' => ['required', 'in:entrepreneur,investor'], // Validar que el rol sea uno de los permitidos
        ]);

        // Intentar la autenticación
        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();

            // Verificar el rol para redirigir al dashboard adecuado
            if ($credentials['role'] === 'entrepreneur') {
                return redirect()->route('Home_Usuario.index'); // Ruta para entrepreneur
            } elseif ($credentials['role'] === 'investor') {
                return redirect()->route('Home_inversor.index'); // Ruta para investor
            }
        }

        // Si la autenticación falla, regresar con error
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no son válidas.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        // Mantenemos la lógica de logout existente
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
