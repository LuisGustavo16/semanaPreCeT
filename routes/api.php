<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ReservasController;
use App\Http\Controllers\API\TreinoController;
use App\Http\Controllers\API\NoticiaController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/editarPerfil', [AuthController::class, 'update']);
Route::post('/gerarSenhaADM', [AuthController::class, 'gerarSenhaADM']);

Route::post('/cadastrarReserva', [ReservasController::class, 'store']);
Route::get('/listarReservas', [ReservasController::class, 'index']);
Route::post('/mostrarReservas', [ReservasController::class, 'mostrarReservas']);

Route::post('/realizarChekin', [TreinoController::class, 'realizarChekin']);
Route::post('/listarTreinos', [TreinoController::class, 'index']);
Route::post('/cancelarChekin', [TreinoController::class, 'cancelarChekin']);
Route::post('/mostrarChekins', [TreinoController::class, 'mostrarChekins']);

Route::get('/listarNoticias', [NoticiaController::class, 'index']);