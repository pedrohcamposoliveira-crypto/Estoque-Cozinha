<?php

use App\Http\Controllers\categoriaController;
use App\Http\Controllers\fornecedorController;
use App\Http\Controllers\GestaoUsuarioController;
use App\Http\Controllers\HistoricoMovimentacaoController;
use App\Http\Controllers\produtoController;
use App\Http\Controllers\RetiradaProdutoController;
use App\Http\Controllers\usuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/cadastro_usuario', [usuarioController::class, 'cadastro_usuario']);
Route::get('/ver_usuario', [usuarioController::class, 'ver_usuario']);
Route::get('/listar_usuarios', [usuarioController::class, 'listar_usuarios']);
Route::get('/listar_usuarios_simples', [usuarioController::class, 'listar_usuarios_simples']);
Route::put('/alterar_usuario', [usuarioController::class, 'alterar_usuario']);
Route::delete('/deletar_usuario', [usuarioController::class, 'deletar_usuario']);

Route::post('/cadastro_fornecedor', [fornecedorController::class, 'cadastro_fornecedor']);
Route::get('/ver_fornecedor', [fornecedorController::class, 'ver_fornecedor']);
Route::get('/listar_fornecedores', [fornecedorController::class, 'listar_fornecedores']);
Route::get('/listar_fornecedores_simples', [fornecedorController::class, 'listar_fornecedores_simples']);
Route::put('/alterar_fornecedor', [fornecedorController::class, 'alterar_fornecedor']);
Route::delete('/deletar_fornecedor', [fornecedorController::class, 'deletar_fornecedor']);

Route::post('/cadastro_produto', [produtoController::class, 'salvar_produto']);
Route::get('/ver_produto', [produtoController::class, 'ver_produto']);
Route::get('/listar_produtos', [produtoController::class, 'listar_produtos']);
Route::get('/listar_produtos_simples', [produtoController::class, 'listar_produtos_simples']);
Route::put('/alterar_produto', [produtoController::class, 'alterar_produto']);
Route::delete('/deletar_produto', [produtoController::class, 'deletar_produto']);

Route::post('/cadastro_categoria', [categoriaController::class, 'salvar_categoria']);
Route::get('/ver_categoria', [categoriaController::class, 'ver_categoria']);
Route::get('/listar_categorias', [categoriaController::class, 'listar_categorias']);
Route::get('/listar_categorias_simples', [categoriaController::class, 'listar_categorias_simples']);
Route::put('/alterar_categoria', [categoriaController::class, 'alterar_categoria']);
Route::delete('/deletar_categoria', [categoriaController::class, 'deletar_categoria']);

Route::apiResource('historicos-movimentacao', HistoricoMovimentacaoController::class)
    ->parameters(['historicos-movimentacao' => 'historicoMovimentacao']);
Route::apiResource('gestao-usuarios', GestaoUsuarioController::class)
    ->parameters(['gestao-usuarios' => 'gestaoUsuario']);
Route::apiResource('retiradas-produtos', RetiradaProdutoController::class)
    ->parameters(['retiradas-produtos' => 'retiradaProduto']);
