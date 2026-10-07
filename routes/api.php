<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/cadastro_usuario', [App\Http\Controllers\usuarioController::class, 'cadastro_usuario']);
Route::get('/ver_usuario', [App\Http\Controllers\usuarioController::class, 'ver_usuario']);