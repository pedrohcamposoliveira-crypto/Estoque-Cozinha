<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\categoriaController;
use App\Http\Controllers\estoqueController;
use App\Http\Controllers\fornecedorController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cadastro', [categoriaController::class, 'cadastro']) ->name('tela_login');

Route::get('/estoque', [estoqueController::class, 'estoque']) ->name('tela_estoque');

Route::get('/fornecedor', [fornecedorController::class, 'cadastro_fornecedor']) ->name('tela_fornecedor');