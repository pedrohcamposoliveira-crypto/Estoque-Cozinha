<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\categoriaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cadastro', [categoriaController::class, 'cadastro']) ->name('tela_login');
