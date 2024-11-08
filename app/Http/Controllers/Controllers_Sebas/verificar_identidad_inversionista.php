<?php

namespace App\Http\Controllers\Controllers_Sebas;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Mail\VerificationCodeMail; // Clase de Mail para enviar el código al correo
use Twilio\Rest\Client; // Paquete de Twilio para SMS

class verificar_identidad_inversionista extends Controller
{
    // Método privado para realizar llamadas a la API
    private function sendDataToApi($url, $data)
    {
        // Llamada HTTP POST a la API para actualizar la contraseña
        $response = Http::post($url, $data);

        // Verificación de éxito en la respuesta de la API
        if ($response->successful()) {
            return $response->json();
        } else {
            return null; // Retorna null en caso de error
        }
    }

    // Método privado para enviar el código de verificación al correo
    private function sendVerificationCodeByEmail($email, $code)
    {
        Mail::to($email)->send(new VerificationCodeMail($code)); // Asumiendo que tienes una clase de Mail configurada
    }

    // Método privado para enviar el código de verificación por SMS (utilizando Twilio)
    private function sendVerificationCodeByPhone($phone, $code)
    {
        $sid = env('TWILIO_SID'); // SID de Twilio
        $authToken = env('TWILIO_AUTH_TOKEN'); // Token de autenticación de Twilio
        $twilioPhoneNumber = env('TWILIO_PHONE_NUMBER'); // Número de teléfono de Twilio

        // Crea el cliente de Twilio
        $client = new Client($sid, $authToken);

        // Envía el SMS
        try {
            $client->messages->create(
                $phone, // El número de teléfono de destino
                [
                    'from' => $twilioPhoneNumber, // Tu número de Twilio
                    'body' => "Tu código de verificación es: $code"
                ]
            );
        } catch (\Exception $e) {
            // Si hay un error al enviar el SMS
            \Log::error('Error al enviar SMS: ' . $e->getMessage());
        }
    }

    // Método para mostrar la vista de cambio de contraseña
    public function index()
    {
        return view('Views_Sebas.Verificar_identidad_inversionista');
    }

    // Método para procesar la solicitud de verificación (correo o teléfono)
    public function sendVerificationCode(Request $request)
    {
        // Validación de los datos de entrada (correo o teléfono)
        $request->validate([
            'contact' => 'required|email_or_phone', // Asegúrate de tener una validación personalizada
        ]);

        // Obtener el contacto (email o teléfono)
        $contact = $request->input('contact');
        $role = Auth::user()->role; // Obtener el rol del usuario (inversionista o usuario)

        // Verificar si el contacto existe en la base de datos según el rol
        $user = null;

        if ($role === 'usuario') {
            $user = \App\Models\User::where('email', $contact)->orWhere('phone', $contact)->first();
        } elseif ($role === 'inversionista') {
            $user = \App\Models\Inversionista::where('email', $contact)->orWhere('phone', $contact)->first();
        }

        if ($user) {
            // Generar un código de verificación aleatorio de 6 dígitos
            $verificationCode = rand(100000, 999999);

            // Guardar el código en la sesión o en la base de datos de manera temporal
            Session::put('verification_code', $verificationCode);
            Session::put('verification_contact', $contact); // Guardamos el contacto para verificar luego

            // Enviar el código de verificación
            if (filter_var($contact, FILTER_VALIDATE_EMAIL)) {
                // Enviar por correo
                $this->sendVerificationCodeByEmail($contact, $verificationCode);
            } else {
                // Enviar por teléfono (SMS)
                $this->sendVerificationCodeByPhone($contact, $verificationCode);
            }

            // Redirigir al formulario de verificación de código
            return redirect()->route('verify.code');
        } else {
            // Si no se encuentra el contacto en la base de datos
            return redirect()->back()->withErrors(['error' => 'El correo electrónico o teléfono no está registrado.']);
        }
    }

    // Método para mostrar la vista donde se ingresa el código de verificación
    public function showVerificationForm()
    {
        return view('Views_Sebas.VerifyCode');
    }

    // Método para procesar la verificación del código
    public function verifyCode(Request $request)
    {
        // Validación de los datos de entrada
        $request->validate([
            'verification_code' => 'required|digits:6', // El código debe ser de 6 dígitos
        ]);

        // Obtener el código ingresado
        $code = $request->input('verification_code');

        // Obtener el código de verificación guardado en la sesión
        $storedCode = Session::get('verification_code');
        $contact = Session::get('verification_contact');

        // Verificar si el código ingresado es correcto
        if ($code == $storedCode) {
            // Redirigir al formulario para cambiar la contraseña
            return redirect()->route('change.password');
        } else {
            return redirect()->back()->withErrors(['error' => 'Código incorrecto. Intenta de nuevo.']);
        }
    }

    // Método para mostrar el formulario de cambio de contraseña
    public function showChangePasswordForm()
    {
        return view('Views_Sebas.verificar_identidad_inversionista');
    }

    // Método para procesar el cambio de contraseña
    public function update(Request $request)
    {
        // Validación de los datos de entrada
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed'
        ]);

        // Obtener el rol del usuario autenticado
        $user = Auth::user();
        $role = $user->role; // Suponiendo que 'role' es el campo que contiene el rol del usuario

        // Definir la URL de la API dependiendo del rol
        $url = env('URL_SERVER_API') . '/api.EmprendeLink'; // URL base de tu API
        if ($role === 'usuario') {
            $url .= '/users/change-password'; // Para el rol de usuario
        } elseif ($role === 'inversionista') {
            $url .= '/investors/change-password'; // Para el rol de inversionista
        } else {
            return redirect()->back()->withErrors(['error' => 'Rol no válido']);
        }

        // Datos para enviar a la API
        $data = [
            'current_password' => $request->input('current_password'),
            'new_password' => $request->input('new_password')
        ];

        // Llamada a la API para cambiar la contraseña
        $response = $this->sendDataToApi($url, $data);

        // Verifica si la actualización fue exitosa
        if ($response) {
            return redirect()->back()->with('success', 'Contraseña actualizada exitosamente.');
        } else {
            return redirect()->back()->withErrors(['error' => 'Error al actualizar la contraseña. Inténtalo de nuevo.']);
        }
    }
}
