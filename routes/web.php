<?php

use App\Http\Controllers\Controllers_Sebas\cambiar_contraseña_inversionista;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntrepreneurListController;
use App\Http\Controllers\EntrepreneurshipController;
use App\Http\Controllers\MyentrepreneurshipController;
use App\Http\Controllers\PublishEntrepreneurshipsController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ConnectionController;
use App\Http\Controllers\Controller_Miguel\Home_inversor;
use App\Http\Controllers\Controllers_Dayron\Chat_Inversor;
use App\Http\Controllers\Controllers_Dayron\Chat_Usuario;
use App\Http\Controllers\Controllers_Dayron\Editar_Emprendimiento;
use App\Http\Controllers\Controllers_Dayron\Editar_Emprendimiento_2;
use App\Http\Controllers\Controllers_Dayron\Home_Usuario;
use App\Http\Controllers\Controllers_Dayron\Mi_Emprendimiento;
use App\Http\Controllers\Controllers_Dayron\Mi_Emprendimiento_2;
use App\Http\Controllers\Controllers_Dayron\Visitar_Emprendimiento_Inversor;
use App\Http\Controllers\Controllers_Dayron\Visitar_Emprendimiento_Inversor_2;
use App\Http\Controllers\Controllers_Dayron\Visitar_Emprendimiento_Usuario;
use App\Http\Controllers\Controllers_Dayron\Visitar_Emprendimiento_usuario_2;
use App\Http\Controllers\InvestorController;
use App\Http\Controllers\entrepreneursController;
use App\Http\Controllers\PerfilInverController;
use App\Http\Controllers\PerfilInverEditarController;
use App\Http\Controllers\PerfilUserEditarController;
use App\Http\Controllers\ListEntrepreneur_InverController;
use App\Http\Controllers\ListEntrepreneur_UserController;
use App\Http\Controllers\PerfilUsuarioController;
use App\Http\Controllers\usaurioPerfil_inversionistaController;


// CONTROLADORES DEL SEBAS
use App\Http\Controllers\Controllers_Sebas\Busqueda_Filtro_UsuarioController;
use App\Http\Controllers\Controllers_Sebas\Busqueda_Filtro_InversionistaController;
use App\Http\Controllers\Controllers_Sebas\Verificar_identidad_cambio_contraseña;
use App\Http\Controllers\Controllers_Sebas\Cambiar_Contraseña_nueva;

use App\Http\Controllers\Controllers_Sebas\inicio_de_sesion_usuariocontroller;
use App\Http\Controllers\Controllers_Sebas\cambiar_contraseña_inversionistacontroller;

use App\Http\Controllers\Controllers_Sebas\inicio_sesion_inversionista;
use App\Http\Controllers\Controllers_Sebas\Registro_inversionista_Controller;
use App\Http\Controllers\Controllers_Sebas\Registro_usuario_Controller;
use App\Http\Controllers\Controllers_Sebas\registro_usuario_ingreso;
use App\Http\Controllers\Controllers_Sebas\registro_inversionista_ingreso;
use App\Http\Controllers\Controllers_Sebas\verificar_codigo_usuario;
use App\Http\Controllers\Controllers_Sebas\Verificar_codigo_inversionista;
use App\Http\Controllers\Controllers_Sebas\verificar_identidad_inversionista;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
 Route::get('/prueba', function () {
        return 'prueba 1234';
    });

    // Views_Gos--->

Route::get('perfilUser', action: [PerfilUsuarioController::class, 'index'])->name('perfilInver.index');
Route::get('perfilUserEditar', [PerfilUserEditarController::class, 'index'])->name('perfilInverEditar.index');

Route::get('perfilInver', action:  [PerfilInverController::class, 'index'])->name('perfilInver.index');
Route::get('perfilInverEditar', [PerfilInverEditarController::class, 'index'])->name('profile.update');

Route::get('listaUsuarios', [ListEntrepreneur_UserController::class, 'index'])->name('listaUsuarios.index');
Route::get('listaInver', [ListEntrepreneur_InverController::class, 'index'])->name('listaUsuarios.index');

Route::get('VerInver', [usaurioPerfil_inversionistaController::class, 'index'])->name('listaUsuarios.index');
Route::get('VerUser', [usaurioPerfil_inversionistaController::class, 'index'])->name('listaUsuarios.index');




// Ruta para obtener lista de usurios

Route::get('EntrepreneurLists', [EntrepreneurListController::class, 'index'])->name('EntrepreneurLists.index');
Route::get('EntrepreneurList/{id}',[EntrepreneurListController::class,'show'])->name('EntrepreneurLists.show');

// Ruta para obtener "Publish_Entrepreneurships"

Route::get('Publicare', [PublishEntrepreneurshipsController::class, 'index'])->name('Publish_Entrepreneurships.index');
Route::get('Publicare/{id}',[PublishEntrepreneurshipsController::class,'show'])->name('Publish_Entrepreneurships.show');



Route::get('entrepreneurships', [EntrepreneurshipController::class, 'index'])->name('entrepreneurships.index');

// Ruta para obtener el detalle de un emprendimiento específico por su ID
Route::get('entrepreneurships/{id}', [EntrepreneurshipController::class, 'show'])->name('entrepreneurships.show');



// Ruta para obtener la lista de todos los "Myentrepreneurships"
Route::get('myentrepreneurships', [MyentrepreneurshipController::class, 'index'])->name('myentrepreneurships.index');

// Ruta para obtener el detalle de un "Myentrepreneurship" específico por su ID
Route::get('myentrepreneurships/{id}', [MyentrepreneurshipController::class, 'show'])->name('myentrepreneurships.show');



// Ruta para la lista de reseñas
Route::get('Reviews', [ReviewController::class, 'index'])->name('Reviews.index');
Route::get('Reviews/{id}', [ReviewController::class, 'show'])->name('Reviews.show');




// rita para obetener la lista de "Connections"
Route::get('Connections', [ConnectionController::class, 'index'])->name('Connection.index');
Route::get('Connections/{id}', [ConnectionController::class, 'show'])->name('Connection.show');

//inversor
Route::get('inversors', [InvestorController::class, 'index'])->name('inversors.index'); // Lista todos los inversores
Route::get('inversors/{id}', [InvestorController::class, 'show'])->name('inversors.show');

//inversor
Route::get('entrepreneurs', [entrepreneursController::class, 'index'])->name('Entrepreneurs.index
'); // Lista todos los inversores
Route::get('entrepreneurs/{id}', [entrepreneursController::class, 'show'])->name('Entrepreneur.show');


// Views_Dayron--->

// Home Usuario -->
Route::get('Home_Usuario', [Home_Usuario::class, 'index'])->name('Home_Usuario.index');
// Route::get('Home_Usuario/{id}', [Home_Usuario::class, 'show'])->name('Home_Usuario.show');

// Chat Usuario -->
Route::get('Chat_Usuario', [Chat_Usuario::class, 'index'])->name('Chat_Usuario.index');

// Chat Inversor -->
Route::get('Chat_Inversor', [Chat_Inversor::class, 'index'])->name('Chat_Inversor.index');

// Mi-Emprendimiento -->
Route::get('Mi_Emprendimiento', [Mi_Emprendimiento::class, 'index'])->name('Mi_Emprendimiento.index');
Route::get('Mi_Emprendimiento_2', [Mi_Emprendimiento_2::class, 'index'])->name('Mi_Emprendimiento_2.index');

// Editar-Emprendimiento -->
Route::get('Editar_Emprendimiento', [Editar_Emprendimiento::class, 'index'])->name('Editar_Emprendimiento.index');
Route::get('Editar_Emprendimiento_2', [Editar_Emprendimiento_2::class, 'index'])->name('Editar_Emprendimiento_2.index');

// Visitar-Emprendimiento -->
Route::get('Visitar_Emprendimiento_Usuario', [Visitar_Emprendimiento_Usuario::class, 'index'])->name('Visitar_Emprendimiento_Usuario.index');
Route::get('Visitar_Emprendimiento_usuario_2', [Visitar_Emprendimiento_usuario_2::class, 'index'])->name('Visitar_Emprendimiento_usuario_2.index');

// Visitar-Emprendimiento - Inversor -->
Route::get('Visitar_Emprendimiento_Inversor', [Visitar_Emprendimiento_Inversor::class, 'index'])->name('Visitar_Emprendimiento_Inversor.index');
Route::get('Visitar_Emprendimiento_Inversor_2', [Visitar_Emprendimiento_Inversor_2::class, 'index'])->name('Visitar_Emprendimiento_Inversor_2.index');



// RUTAS DEL SEBAS

// BUsqueda por filtro usuario e inversionista
Route::get('Buscar_Emprendimientos_usuario',[Busqueda_Filtro_UsuarioController::class,'index'])->name('filtrar_usuario'); // ets enombre se va a enlazar con otro archivo html, y el que esta en español el primero es el que se escrive en google para mirar las vistas
Route::get('Buscar_Emprendimientos_inversionista',[Busqueda_Filtro_InversionistaController::class,'index'])->name('filtrar_inver'); // ets enombre se va a enlazar con otro archivo html, y el que esta en español el primero es el que se escrive en google para mirar las vistas

// verificar identidad usuario e inversionista
Route::get('verificar_identidad_usuario',[Verificar_identidad_cambio_contraseña::class,'index'])->name('verificar_identidad_usuario'); // ets enombre se va a enlazar con otro archivo html, y el que esta en español el primero es el que se escrive en google para mirar las vistas
Route::get('verificar_identidad_inversionista',[verificar_identidad_inversionista::class,'index'])->name('verificar_identidad_inversionista'); // ets enombre se va a enlazar con otro archivo html, y el que esta en español el primero es el que se escrive en google para mirar las vistas

//cambiar contraseñas nuevas usuario e inversioinista
Route::get('cambiar_contraseña_usuario',[Cambiar_Contraseña_nueva::class,'index'])->name('cambiar_contraseña_usuario'); // ets enombre se va a enlazar con otro archivo html, y el que esta en español el primero es el que se escrive en google para mirar las vistas
Route::get('cambiar_contraseña_inversionista',[cambiar_contraseña_inversionistacontroller::class,'index'])->name('cambiar_contraseña_inversionista'); // ets enombre se va a enlazar con otro archivo html, y el que esta en español el primero es el que se escrive en google para mirar las vistas

//iniciar sesion usuario e inversionista
Route::get('iniciar_sesion_usuario',[inicio_de_sesion_usuariocontroller::class,'index'])->name('iniciar_sesion_usuario'); // ets enombre se va a enlazar con otro archivo html, y el que esta en español el primero es el que se escrive en google para mirar las vistas
Route::get('iniciar_sesion_inversionista',[inicio_sesion_inversionista::class,'index'])->name('iniciar_sesion_inver'); // ets enombre se va a enlazar con otro archivo html, y el que esta en español el primero es el que se escrive en google para mirar las vistas

//registro usuario e inversionista
Route::get('registrar_nuevo_usuario',[Registro_usuario_Controller::class,'index'])->name('registrar_nuevo_usuario'); // ets enombre se va a enlazar con otro archivo html, y el que esta en español el primero es el que se escrive en google para mirar las vistas
Route::get('registrar_nuevo_inversionista',[Registro_inversionista_Controller::class,'index'])->name('registrar_nuevo_inversionista'); // ets enombre se va a enlazar con otro archivo html, y el que esta en español el primero es el que se escrive en google para mirar las vistas

//registro ingreso usuario e inversionista
Route::get('registrar_usuario_ingreso',[Registro_usuario_ingreso::class,'index'])->name('registrar_usuario'); // ets enombre se va a enlazar con otro archivo html, y el que esta en español el primero es el que se escrive en google para mirar las vistas
Route::get('registrar_inversionista_ingreso',[registro_inversionista_ingreso::class,'index'])->name('registrar_inversionista'); // ets enombre se va a enlazar con otro archivo html, y el que esta en español el primero es el que se escrive en google para mirar las vistas

//verificar codigo usuario e inversionista
Route::get('verificar_codigo_usuario',[verificar_codigo_usuario::class,'index'])->name('verificar_codigo_usuario'); // ets enombre se va a enlazar con otro archivo html, y el que esta en español el primero es el que se escrive en google para mirar las vistas
Route::get('verificar_codigo_inversionista',[Verificar_codigo_inversionista::class,'index'])->name('verificar_codigo_inversionista'); // ets enombre se va a enlazar con otro archivo html, y el que esta en español el primero es el que se escrive en google para mirar las vistas



// RUTAS DEL Miguel
Route::get('Home_inversor', [Home_inversor::class, 'index'])->name('Home_inversor.index');


