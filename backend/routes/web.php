<?php

use App\Http\Controllers\CampeonatoController;
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
    return view('welcome');
}); 

Route::resource('/campeonato', CampeonatoController::class)
->except('show');

Route::delete('/campeonato/destroy/{campeonato}', [CampeonatoController::class, 'destroy'])->name('campeonato.destroy');

// Route::controller(CampeonatoController::class)->group(function() {

//     Route::get('/campeonato', 'index')->name('campeonato.index');
//     Route::get('/campeonato/criar', 'create')->name('campeonato.create');
//     Route::post('/campeonato/salvar', 'store')->name('campeonato.store');

// });


