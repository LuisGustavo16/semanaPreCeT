<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ReservasController;
use App\Http\Controllers\API\TreinoController;
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
Route::post('/login', [AuthController::class, 'login']);

Route::post('/cadastrarReserva', [ReservasController::class, 'store']);
Route::get('/listarReservas', [ReservasController::class, 'index']);

Route::post('/realizarChekin', [TreinoController::class, 'realizarChekin']);
Route::post('/listarTreinos', [TreinoController::class, 'index']);
Route::post('/cancelarChekin', [TreinoController::class, 'cancelarChekin']);
