<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/cadastro_usuario', [App\Http\Controllers\usuarioController::class, 'cadastro_usuario']);
Route::get('/ver_usuario', [App\Http\Controllers\usuarioController::class, 'ver_usuario']);
Route::get('/listar_usuarios', [App\Http\Controllers\usuarioController::class, 'listar_usuarios']);
Route::get('/listar_usuarios_simples', [App\Http\Controllers\usuarioController::class, 'listar_usuarios_simples']);
Route::put('/alterar_usuario', [App\Http\Controllers\usuarioController::class, 'alterar_usuario']);
Route::delete('/deletar_usuario', [App\Http\Controllers\usuarioController::class, 'deletar_usuario']);

Route::apiResource('historicos-movimentacao', App\Http\Controllers\HistoricoMovimentacaoController::class)
    ->parameters(['historicos-movimentacao' => 'historicoMovimentacao']);
Route::apiResource('gestao-usuarios', App\Http\Controllers\GestaoUsuarioController::class)
    ->parameters(['gestao-usuarios' => 'gestaoUsuario']);
Route::apiResource('retiradas-produtos', App\Http\Controllers\RetiradaProdutoController::class)
    ->parameters(['retiradas-produtos' => 'retiradaProduto']);
