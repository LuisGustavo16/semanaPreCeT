<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ReservasController;
use App\Http\Controllers\API\TreinoController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/editarPerfil', [AuthController::class, 'update']);

Route::post('/cadastrarReserva', [ReservasController::class, 'store']);
Route::get('/listarReservas', [ReservasController::class, 'index']);
Route::post('/mostrarReservas', [ReservasController::class, 'mostrarReservas']);

Route::post('/realizarChekin', [TreinoController::class, 'realizarChekin']);
Route::post('/listarTreinos', [TreinoController::class, 'index']);
Route::post('/cancelarChekin', [TreinoController::class, 'cancelarChekin']);
Route::post('/mostrarChekins', [TreinoController::class, 'mostrarChekins']);

