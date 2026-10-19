<?php

use App\Http\Controllers\cadastro_usuarioController;
use App\Http\Controllers\estoqueController;
use App\Http\Controllers\fornecedorController;
use App\Http\Controllers\GestaoUsuarioController;
use App\Http\Controllers\HistoricoMovimentacaoController;
use App\Http\Controllers\MeusuarioController;
use App\Http\Controllers\produtoController;
use App\Http\Controllers\RetiradaProdutoController;
use App\Http\Controllers\usuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cadastro', [usuarioController::class, 'cadastro'])->name('tela_login');

Route::get('/estoque', [estoqueController::class, 'estoque'])->name('tela_estoque');

Route::get('/fornecedor', [fornecedorController::class, 'cadastro_fornecedor'])->name('tela_fornecedor');

Route::get('/produto', [produtoController::class, 'cadastro_produto'])->name('tela_produto');

Route::get('/historico-movimentacao', [HistoricoMovimentacaoController::class, 'historico_movimentacao'])->name('tela_historico_movimentacao');

Route::get('/retirada-produto', [RetiradaProdutoController::class, 'retirada_produto'])->name('tela_retirada_produto');

Route::get('/gestao-usuario', [GestaoUsuarioController::class, 'gestao_usuario'])->name('tela_gestao_usuario');

Route::get('/meu-usuario', [MeusuarioController::class, 'meu_usuario'])->name('tela_meu_usuario');

Route::get('/cadastro-usuario', [cadastro_usuarioController::class, 'cadastro_usuario'])->name('tela_cadastro_usuario');
