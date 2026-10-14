<?php

namespace App\Http\Controllers;

use App\Models\HistoricoMovimentacao;
use Illuminate\Http\Request;

class HistoricoMovimentacaoController extends Controller
{
    public function index()
    {
        return response()->json(
            HistoricoMovimentacao::with('produto:id,Nome')->orderByDesc('data_movimentacao')->get()
        );
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'data_movimentacao' => 'sometimes|required|date',
            'tipo_movimentacao' => 'required|string|max:255',
            'produto_id' => 'required|integer|exists:produto,id',
            'quantidade' => 'required|numeric|gt:0',
            'unidade' => 'required|string|max:50',
            'funcionario' => 'required|string|max:255',
            'observacao' => 'nullable|string',
        ]);

        $dados['data_movimentacao'] ??= now();
        $movimentacao = HistoricoMovimentacao::create($dados);

        return response()->json($movimentacao->load('produto:id,Nome'), 201);
    }

    public function show(HistoricoMovimentacao $historicoMovimentacao)
    {
        return response()->json($historicoMovimentacao->load('produto:id,Nome'));
    }

    public function update(Request $request, HistoricoMovimentacao $historicoMovimentacao)
    {
        $dados = $request->validate([
            'data_movimentacao' => 'sometimes|required|date',
            'tipo_movimentacao' => 'sometimes|required|string|max:255',
            'produto_id' => 'sometimes|required|integer|exists:produto,id',
            'quantidade' => 'sometimes|required|numeric|gt:0',
            'unidade' => 'sometimes|required|string|max:50',
            'funcionario' => 'sometimes|required|string|max:255',
            'observacao' => 'sometimes|nullable|string',
        ]);

        $historicoMovimentacao->update($dados);

        return response()->json($historicoMovimentacao->fresh()->load('produto:id,Nome'));
    }

    public function destroy(HistoricoMovimentacao $historicoMovimentacao)
    {
        $historicoMovimentacao->delete();

        return response()->noContent();
    }
}
