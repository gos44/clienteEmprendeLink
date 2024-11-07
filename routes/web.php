<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntrepreneurListController;
use App\Http\Controllers\EntrepreneurshipController;
use App\Http\Controllers\MyentrepreneurshipController;
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
use App\Http\Controllers\PerfilInverController;
use App\Http\Controllers\PerfilIverEditarController;
use App\Http\Controllers\PerfilUserEditarController;
use App\Http\Controllers\ListEntrepreneur_InverController;
use App\Http\Controllers\ListEntrepreneur_UserController;

use App\Http\Controllers\PerfilUsuarioController;


use App\Http\Controllers\usaurioPerfil_inversionistaController;


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

Route::get('perfilUser', action: [PerfilUsuarioController::class, 'index'])->name('perfilInver.index');
Route::get('perfilUserEditar', [PerfilUserEditarController::class, 'index'])->name('perfilInverEditar.index');

Route::get('perfilInver', action:  [PerfilInverController::class, 'index'])->name('perfilInver.index');
Route::get('perfilInverEditar', [PerfilInverController::class, 'index'])->name('perfilInverEditar.index');

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


//<----//