<?php

use App\Http\Controllers\CampeonatoController;
use App\Http\Controllers\EliminacaoController;
use App\Http\Controllers\JogoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::middleware('auth:sanctum')->group(function () {
    Route::resource('campeonatos', CampeonatoController::class);
    Route::resource('times', TimeController::class);
    Route::resource('jogos', JogoController::class);
    Route::resource('eliminacoes', EliminacaoController::class);
});

Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::post('/register', [UsersController::class, 'store']);
