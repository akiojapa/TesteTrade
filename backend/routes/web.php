<?php

use App\Http\Controllers\CampeonatoController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('/campeonato');
})->middleware(\App\Http\Middleware\Autenticador::class); 

Route::resource('/campeonato', CampeonatoController::class)
->except('show');

Route::delete('/campeonato/destroy/{campeonato}', [CampeonatoController::class, 'destroy'])->name('campeonato.destroy');

// Route::controller(CampeonatoController::class)->group(function() {

//     Route::get('/campeonato', 'index')->name('campeonato.index');
//     Route::get('/campeonato/criar', 'create')->name('campeonato.create');
//     Route::post('/campeonato/salvar', 'store')->name('campeonato.store');

// });


Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('/login', [App\Http\Controllers\LoginController::class, 'store'])->name('signin');
Route::get('/logout', [UsersController::class, 'destroy'])->name('logout');


Route::get('/register', [UsersController::class, 'create'])->name('users.create');
Route::post('/register', [UsersController::class, 'store'])->name('users.store');




