<?php

use App\Http\Controllers\Controller_Miguel\Home_inversor;
use App\Http\Controllers\Controller_Miguel\Publicar_Emprendimiento_Controller;
use App\Http\Controllers\Controllers_Sebas\cambiar_contraseña_inversionistacontroller;

use App\Http\Controllers\Controllers_Sebas\inicio_sesion_inversionista;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntrepreneurListController;
use App\Http\Controllers\EntrepreneurshipController;
use App\Http\Controllers\Controllers_Gos\MisEmpredimientosController;
use App\Http\Controllers\PublishEntrepreneurshipsController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ConnectionController;
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

//CONTROLADORES DEL GOS
use App\Http\Controllers\Controllers_Gos\PerfilInverController;
use App\Http\Controllers\Controllers_Gos\PerfilInverEditarController;
use App\Http\Controllers\Controllers_Gos\PerfilUserEditarController;
use App\Http\Controllers\Controllers_Gos\ListEntrepreneur_InverController;
use App\Http\Controllers\Controllers_Gos\ListEntrepreneur_UserController;
use App\Http\Controllers\Controllers_Gos\PerfilUsuarioController;
use App\Http\Controllers\Controllers_Gos\usaurioPerfil_inversionistaController;
use App\Http\Controllers\Controllers_Gos\usaurioPerfil_usuarioController;

use App\Http\Controllers\Controllers_Gos\AcuedosYTerminosUserController;
use App\Http\Controllers\Controllers_Gos\acuerdosyterminosHomeController;
use App\Http\Controllers\Controllers_Gos\acuerdosyterminosInverController;
use App\Http\Controllers\Controllers_Gos\politicayprivacidadController;
use App\Http\Controllers\Controllers_Gos\politicayprivacidadHomeController;
use App\Http\Controllers\Controllers_Gos\politicayprivacidadInverController;
use App\Http\Controllers\Controllers_Gos\HomeController;
use App\Http\Controllers\Controllers_Gos\sobreEmpredelinkController;
use App\Http\Controllers\Controllers_Gos\sobreEmpredelinkHomeController;
use App\Http\Controllers\Controllers_Gos\sobreEmpredelinkInversorController;







// CONTROLADORES DEL SEBAS

use App\Http\Controllers\Controllers_Sebas\Busqueda_Filtro_UsuarioController;
use App\Http\Controllers\Controllers_Sebas\Busqueda_Filtro_InversionistaController;
use App\Http\Controllers\Controllers_Sebas\Verificar_identidad_cambio_contraseña;
use App\Http\Controllers\Controllers_Sebas\Cambiar_Contraseña_nueva;
use App\Http\Controllers\Controllers_Sebas\inicio_de_sesion_controller;
use App\Http\Controllers\Controllers_Sebas\Registro_inversionista_Controller;
use App\Http\Controllers\Controllers_Sebas\Registro_usuario_Controller;
use App\Http\Controllers\Controllers_Sebas\registro_usuario_ingreso;
use App\Http\Controllers\Controllers_Sebas\registro_inversionista_ingreso;
use App\Http\Controllers\Controllers_Sebas\verificar_codigo_usuario;
use App\Http\Controllers\Controllers_Sebas\Verificar_codigo_inversionista;
use App\Http\Controllers\Controllers_Sebas\verificar_identidad_inversionista;

use App\Http\Controllers\Controllers_Sebas\emprendimientos_deportivos_usuario;
use App\Http\Controllers\Controllers_Sebas\inicio_de_sesion_usuariocontroller;


use App\Http\Controllers\Controller_k\Notificaciones;
use App\Http\Controllers\Controller_k\Contactanos;
use App\Http\Controllers\Controller_k\Resena;
use App\Http\Controllers\Controller_k\Resena2;
use App\Http\Controllers\Controller_k\Resena3;
use App\Http\Controllers\Controller_k\Resena4;
use App\Http\Controllers\Controller_k\ResenaInver;
use App\Http\Controllers\Controllers_Sebas\articulos_deportivos_inversionista;
use App\Http\Controllers\EmprendimientoController;


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
 Route::get('/prueba2', function () {
        return 'prueba CLIENte';
    });





// Ruta para obtener lista de usurios

Route::get('listaEmprendedores', [EntrepreneurListController::class, 'index'])->name('EntrepreneurLists.index');
Route::get('EntrepreneurList/{id}',[EntrepreneurListController::class,'show'])->name('EntrepreneurLists.show');

// Ruta para obtener "Publish_Entrepreneurships"

Route::get('publicare', [PublishEntrepreneurshipsController::class, 'index'])->name('Publish_Entrepreneurships.index');
Route::get('Publicare/{id}',[PublishEntrepreneurshipsController::class,'show'])->name('Publish_Entrepreneurships.show');



Route::get('entrepreneurships', [EntrepreneurshipController::class, 'index'])->name('entrepreneurships.index');

// Ruta para obtener el detalle de un emprendimiento específico por su ID
Route::get('entrepreneurships/{id}', [EntrepreneurshipController::class, 'show'])->name('entrepreneurships.show');



// Ruta para obtener la lista de todos los "Myentrepreneurships"
Route::get('myentrepreneurships', [MisEmpredimientosController::class, 'index'])->name('myentrepreneurships.index');

// Ruta para obtener el detalle de un "Myentrepreneurship" específico por su ID
Route::get('myentrepreneurships/{id}', [Mi_Emprendimiento::class, 'show'])->name('myentrepreneurships.show');



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

    // Route::get('Home_Usuario', [Home_Usuario::class, 'index'])
    //     ->name('Home_Usuario.index')
    //     ->middleware('auth.custom');

    // Route::get('Home_Usuario', [Home_Usuario::class, 'index'])
    // ->name('Home_Usuario.index')
    // ->middleware(['auth:sanctum', 'role:entrepreneur']);



// Route::get('Home_Usuario', [Home_Usuario::class, 'index'])->name('Home_Usuario.index');


// Route::get('Home_Usuario/{id}', [Home_Usuario::class, 'show'])->name('Home_Usuario.show');

// Chat Usuario -->
Route::get('Chat_Usuario', [Chat_Usuario::class, 'index'])->name('Chat_Usuario.index');

// Chat Inversor -->
Route::get('Chat_Inversor', [Chat_Inversor::class, 'index'])->name('Chat_Inversor.index');





// Mi-Emprendimiento ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd
Route::get('myentrepreneurships/{id}', [Mi_Emprendimiento::class, 'show'])->name('myentrepreneurships.show');



Route::get('Mi_Emprendimiento_2', [Mi_Emprendimiento_2::class, 'index'])->name('Mi_Emprendimiento_2.index');

// Editar-Emprendimiento -->
Route::get('Editar_Emprendimiento', [Editar_Emprendimiento::class, 'index'])->name('Editar_Emprendimiento.index');
Route::get('Editar_Emprendimiento_2', [Editar_Emprendimiento_2::class, 'index'])->name('Editar_Emprendimiento_2.index');

// Visitar-Emprendimiento -->
// En otro controlador o ruta
    Route::get('Visitar_Emprendimiento_Usuario/{id}', [Visitar_Emprendimiento_Usuario::class, 'show'])
        ->name('Visitar_Emprendimiento_Usuario.show');
    Route::get('Visitar_Emprendimiento_usuario_2', [Visitar_Emprendimiento_usuario_2::class, 'index'])->name('Visitar_Emprendimiento_usuario_2.index');

// Visitar-Emprendimiento - Inversor -->
Route::get('Visitar_Emprendimiento_Inversor/{id}', [Visitar_Emprendimiento_Inversor::class, 'show'])
    ->name('Visitar_Emprendimiento_Inversor.show');
    Route::get('Visitar_Emprendimiento_Inversor_2', [Visitar_Emprendimiento_Inversor_2::class, 'index'])->name('Visitar_Emprendimiento_Inversor_2.index');







// RUTAS DEL SEBAS


// BUsqueda por filtro usuario e inversionista
Route::get('Buscar_Emprendimientos_usuario',[Busqueda_Filtro_UsuarioController::class,'index'])->name('filtrar_usuario'); // ets enombre se va a enlazar con otro archivo html, y el que esta en español el primero es el que se escrive en google para mirar las vistas
Route::get('Buscar_Emprendimientos_inversionista',[Busqueda_Filtro_InversionistaController::class,'index'])->name('filtrar_inver'); // ets enombre se va a enlazar con otro archivo html, y el que esta en español el primero es el que se escrive en google para mirar las vistas

// verificar identidad usuario e inversionista
Route::get('verificar_identidad_usuario',[Verificar_identidad_cambio_contraseña::class,'index'])->name('verificar_identidad_usuario'); // ets enombre se va a enlazar con otro archivo html, y el que esta en español el primero es el que se escrive en google para mirar las vistas
Route::get('verificar_identidad_inversionista',[verificar_identidad_inversionista::class,'index'])->name('verificar_identidad_inversionista'); // ets enombre se va a enlazar con otro archivo html, y el que esta en español el primero es el que se escrive en google para mirar las vistas

//cambiar contraseñas nuevas usuario e inversioinista
Route::post('cambiar_contraseña_usuario',[Cambiar_Contraseña_nueva::class,'index'])->name('cambiar_contraseña_usuario'); // ets enombre se va a enlazar con otro archivo html, y el que esta en español el primero es el que se escrive en google para mirar las vistas
Route::get('cambiar_contraseña_inversionista',[cambiar_contraseña_inversionistacontroller::class,'index'])->name('cambiar_contraseña_inversionista'); // ets enombre se va a enlazar con otro archivo html, y el que esta en español el primero es el que se escrive en google para mirar las vistas


Route::post('iniciar_sesion_inversionista',[inicio_sesion_inversionista::class,'index'])->name('iniciar_sesion_inversionista'); // ets enombre se va a enlazar con otro archivo html, y el que esta en español el primero es el que se escrive en google para mirar las vistas


//Estas son las rutas para el registro e inicio de sesion de los dos usuarios tanto emprendedor como inversionista

Route::post('registrar_nuevo_usuario', [Registro_usuario_Controller::class, 'store'])->name('registrar_nuevo_usuario.store');


// Route::get('Home_Usuario', [Home_Usuario::class, 'index'])->name('Home_Usuario.index');


use App\Http\Controllers\Controllers_Sebas\DashboardController;


// Rutas de autenticación
Route::get('login', [inicio_de_sesion_usuariocontroller::class, 'index'])->name('login');
Route::post('login', [inicio_de_sesion_usuariocontroller::class, 'login'])->name('login.store');
Route::post('logout', [inicio_de_sesion_usuariocontroller::class, 'logout'])->name('logout');

// Ruta protegida
Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

});



    Route::get('Home_Usuario', [Home_Usuario::class, 'index'])->name('Home_Usuario.index');
    Route::get('Home_inversor', [Home_Inversor::class, 'index'])->name('Home_inversor.index');



Route::post('iniciar_sesion_usuario/login', action: [inicio_de_sesion_usuariocontroller::class, 'login'])->name('iniciar_sesion_usuario.login');


Route::get('iniciar_sesion_usuario/login', [inicio_de_sesion_usuariocontroller::class, 'index'])->name('iniciar_sesion_usuario.index');




Route::get('perfilInver', action:  [PerfilInverController::class, 'index'])->name('perfilInver.index');


Route::get('perfilUser', action: [PerfilUsuarioController::class, 'index'])->name('perfilUser.index');






Route::get('registrar_nuevo_usuario',[Registro_usuario_Controller::class,'index'])->name('registrar_nuevo_usuario'); // ets enombre se va a enlazar con otro archivo html, y el que esta en español el primero es el que se escrive en google para mirar las vistas
Route::get('registrar_nuevo_inversionista',[Registro_inversionista_Controller::class,'index'])->name('registrar_nuevo_inversionista'); // ets enombre se va a enlazar con otro archivo html, y el que esta en español el primero es el que se escrive en google para mirar las vistas

//registro ingreso usuario e inversionista
Route::get('registrar_usuario_ingreso',[Registro_usuario_ingreso::class,'index'])->name('registrar_usuario_ingreso'); // ets enombre se va a enlazar con otro archivo html, y el que esta en español el primero es el que se escrive en google para mirar las vistas
Route::get('registrar_inversionista_ingreso',[registro_inversionista_ingreso::class,'index'])->name('registrar_inversionista_ingreso'); // ets enombre se va a enlazar con otro archivo html, y el que esta en español el primero es el que se escrive en google para mirar las vistas

//verificar codigo usuario e inversionista
Route::get('verificar_codigo_usuario',[verificar_codigo_usuario::class,'index'])->name('verificar_codigo_usuario'); // ets enombre se va a enlazar con otro archivo html, y el que esta en español el primero es el que se escrive en google para mirar las vistas
Route::get('verificar_codigo_inversionista',[Verificar_codigo_inversionista::class,'index'])->name('verificar_codigo_inversionista'); // ets enombre se va a enlazar con otro archivo html, y el que esta en español el primero es el que se escrive en google para mirar las vistas

//emprendimientos deportivos usuario

Route::get('emprendimientos_deportivos_usuario',[emprendimientos_deportivos_usuario::class,'index'])->name('emprendimientos_deportivos_usuario'); // ets enombre se va a enlazar con otro archivo html, y el que esta en español el primero es el que se escrive en google para mirar las vistas
Route::get('emprendimientos_deportivos_inversionista',[articulos_deportivos_inversionista::class,'index'])->name('emprendimientos_deportivos_inversionista'); // ets enombre se va a enlazar con otro archivo html, y el que esta en español el primero es el que se escrive en google para mirar las vistas


Route::get('Home_Usuario', [Home_Usuario::class, 'index'])->name('Home_Usuario.index');


// RUTAS DEL Miguel
Route::get('Home_inversor', [Home_inversor::class, 'index'])->name('Home_inversor.index');
//publicar emprendimiento



// Route::get('/publicar-emprendimiento/paso-1', [Publicar_Emprendimiento_Controller::class, 'paso1'])->name('Publicar_Emprendimiento1');
// Route::post('/publicar-emprendimiento/paso-1', [Publicar_Emprendimiento_Controller::class, 'guardarPaso1']);

// Route::get('/publicar-emprendimiento/paso-2', [Publicar_Emprendimiento_Controller::class, 'paso2'])->name('Publicar_Emprendimiento2');
// Route::post('/publicar-emprendimiento/paso-2', [Publicar_Emprendimiento_Controller::class, 'guardarPaso2']);

// Route::get('/publicar-emprendimiento/paso-3', [Publicar_Emprendimiento_Controller::class, 'paso3'])->name('Publicar_Emprendimiento3');
// Route::post('/publicar-emprendimiento/paso-3', [Publicar_Emprendimiento_Controller::class, 'guardarPaso3']);



Route::get('/publicar-emprendimiento', [Publicar_Emprendimiento_Controller::class, 'index'])->name('Publicar_Emprendimiento');
Route::post('/publicar-emprendimiento', [Publicar_Emprendimiento_Controller::class, 'guardarEmprendimiento'])->name('guardarEmprendimiento');


// Route::get('Publicar_Emprendimiento1', [Publicar_Emprendimiento::class, 'Publicar_Emprendimiento1'])
//     ->name('Publicar_Emprendimiento1');

// Route::post('Publicar_Emprendimiento1', [Publicar_Emprendimiento::class, 'storeStep1'])
//     ->name('Publicar_Emprendimiento1.store');

// Route::get('Publicar_Emprendimiento2', [Publicar_Emprendimiento::class, 'Publicar_Emprendimiento2'])
//     ->name('Publicar_Emprendimiento2');

// Route::post('Publicar_Emprendimiento2', [Publicar_Emprendimiento::class, 'storeStep2'])
//     ->name('Publicar_Emprendimiento2.store');

// Route::get('Publicar_Emprendimiento3', [Publicar_Emprendimiento::class, 'Publicar_Emprendimiento3'])
//     ->name('Publicar_Emprendimiento3');

// Route::post('Publicar_Emprendimiento3', [Publicar_Emprendimiento::class, 'store'])
//     ->name('Publicar_Emprendimiento3.store');

//rutas k

// Route::get('PublicarEmprendimiento',[PublishEntrepreneurshipsController::class,'Publicar_emprendimiento'])->name('publicentrepreneurships'); // ets enombre se va a enlazar con otro archivo html, y el que esta en español el primero es el que se escrive en google para mirar las vistas

//reseñas
Route::get('resena', [Resena::class, 'Resena'])->name('resena');
Route::get('resena2', [Resena2::class, 'Resena2'])->name('resena2');
Route::get('resena3', [Resena3::class, 'Resena3'])->name('resena3');
Route::get('resena4', [Resena4::class, 'Resena4'])->name('resena4');
//inver
Route::get('resenaInver', [ResenaInver::class, 'index'])->name('resenaInver');
Route::post('resenaInver/store', [ResenaInver::class, 'store'])->name('resenaInver.store');

//notificaciones

Route::get('notificaciones', [Notificaciones::class, 'Notificaciones'])->name('Notificaciones');
Route::get('notificaciones2', [Notificaciones::class, 'Notificaciones2'])->name('Notificaciones2');
Route::get('notificaciones3', [Notificaciones::class, 'Notificaciones3'])->name('Notificaciones3');

Route::get('notificacionesInver', [Notificaciones::class, 'NotificacionesInver'])->name('NotificacionesInver');
Route::get('notificacionesInver2', [Notificaciones::class, 'NotificacionesInver2'])->name('NotificacionesInver2');
Route::get('notificacionesInver3', [Notificaciones::class, 'NotificacionesInver3'])->name('NotificacionesInver3');

//contactanos

Route::get('contactanosUsu', [Contactanos::class, 'ContactanosUsu'])->name('ContactanosUsu');
Route::get('contactanosInver', [Contactanos::class, 'ContactanosInver'])->name('ContactanosInver');
Route::get('contactanosHome', [Contactanos::class, 'ContactanosHome'])->name('ContactanosHome');


// Views_Gos--->

Route::get('Home1', action: [HomeController::class, 'index'])->name('Home1.index');

// Route::get('perfilUser/{id}', [PerfilUsuarioController::class, 'index'])->name('perfilUser.index');
Route::get('perfilUserEditar', [PerfilUserEditarController::class, 'index'])->name('perfilUserEditar.index');

Route::get('perfilInverEditar', [PerfilInverEditarController::class, 'index'])->name('profile.update');

Route::get('listaUsuarios', [ListEntrepreneur_UserController::class, 'index'])->name('listaUsuarios.index');
Route::get('listaInver', [ListEntrepreneur_InverController::class, 'index'])->name('listaInver.index');

Route::get('VerInver', [usaurioPerfil_inversionistaController::class, 'index'])->name('VerInver.index');
Route::get('VerUser', [usaurioPerfil_usuarioController::class, 'index'])->name('VerUser.index');


Route::get('AcuerdosUser', action: [AcuedosYTerminosUserController::class, 'index'])->name('AcuerdosUser.index');
Route::get('AcuerdosHome', [acuerdosyterminosHomeController::class, 'index'])->name('AcuerdosHome.index');
Route::get('AcuerdosInver', action: [acuerdosyterminosInverController::class, 'index'])->name('AcuerdosInver.index');

Route::get('PoliticaUser', [politicayprivacidadController::class, 'index'])->name('PoliticaUser.index');
Route::get('PoliticaHome', action: [politicayprivacidadHomeController::class, 'index'])->name('PoliticaHome.index');
Route::get('PoliticaInver', [politicayprivacidadInverController::class, 'index'])->name('PoliticaInver.index');


Route::get('sobreEmUser', [sobreEmpredelinkController::class, 'index'])->name('sobreEmUser.index');
Route::get('sobreEmHome', action: [sobreEmpredelinkHomeController::class, 'index'])->name('sobreEmHome.index');
Route::get('sobreEmInver', [sobreEmpredelinkInversorController::class, 'index'])->name('sobreEmInver.index');
Route::get('MisEmpredimientos', [MisEmpredimientosController::class, 'index'])->name('MisEmpredimientos.index');
