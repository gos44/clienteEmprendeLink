<?php

namespace App\Http\Controllers\Controllers_Dayron;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Home_Usuario extends Controller
{
    public function index()
    {
        // Recuperar el token de la sesión
        $token = session('auth_token');

        // Verificar si el usuario está autenticado
        if ($token) {
            // Redirigir al home correspondiente según el rol
            $role = session('user_role');
            if ($role == 'entrepreneur') {
                return view('Views_Dayron.Home_Usuario', compact('token'));
            } elseif ($role == 'investor') {
                return view('views_Miguel.home_inversor', compact('token'));
            }
        }

        // Si no hay token o rol, redirigir al inicio de sesión
        return redirect()->route('iniciar_sesion_usuario.index');
    }
}
