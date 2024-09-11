<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntrepreneurListController;


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



Route::get('EntrepreneurLists', [EntrepreneurListController::class, 'index'])->name('EntrepreneurList.index');
Route::get('EntrepreneurList/{id}',[EntrepreneurListController::class,'show'])->name('EntrepreneurLists.show');