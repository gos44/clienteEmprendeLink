<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntrepreneurListController;
use App\Http\Controllers\EntrepreneurshipController;
use App\Http\Controllers\MyentrepreneurshipController;
use App\Http\Controllers\PublishEntrepreneurshipsController;



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



Route::get('EntrepreneurLists', [EntrepreneurListController::class, 'index'])->name('EntrepreneurLists.index');
Route::get('EntrepreneurList/{id}',[EntrepreneurListController::class,'show'])->name('EntrepreneurLists.show');

Route::get('Publicare', [PublishEntrepreneurshipsController::class, 'index'])->name('Publish_Entrepreneurships.index');
Route::get('Publicare/{id}',[PublishEntrepreneurshipsController::class,'show'])->name('Publish_Entrepreneurships.show');



Route::get('entrepreneurships', [EntrepreneurshipController::class, 'index'])->name('entrepreneurships.index');

// Ruta para obtener el detalle de un emprendimiento específico por su ID
Route::get('entrepreneurships/{id}', [EntrepreneurshipController::class, 'show'])->name('entrepreneurships.show');



// Ruta para obtener la lista de todos los "Myentrepreneurships"
Route::get('myentrepreneurships', [MyentrepreneurshipController::class, 'index'])->name('myentrepreneurships.index');

// Ruta para obtener el detalle de un "Myentrepreneurship" específico por su ID
Route::get('myentrepreneurships/{id}', [MyentrepreneurshipController::class, 'show'])->name('myentrepreneurships.show');

Route::get('PublicarEmprendimiento',[PublishEntrepreneurshipsController::class,'Publicar_emprendimiento'])->name('publicentrepreneurships'); // ets enombre se va a enlazar con otro archivo html, y el que esta en español el primero es el que se escrive en google para mirar las vistas