<?php

use App\Http\Controllers\CampeonatoController;
use App\Http\Controllers\EliminacaoController;
use App\Http\Controllers\JogoController;
use App\Http\Controllers\TimeController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('campeonatos', CampeonatoController::class);
Route::resource('times', TimeController::class);
Route::resource('jogos', JogoController::class);
Route::resource('eliminacoes', EliminacaoController::class);
Route::get('campeonatos/{id}/detalhes', [CampeonatoController::class, 'getDetails']);
