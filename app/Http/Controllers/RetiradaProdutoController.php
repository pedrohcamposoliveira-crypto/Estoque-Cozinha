<?php

namespace App\Http\Controllers;

use App\Models\RetiradaProduto;
use Illuminate\Http\Request;

class RetiradaProdutoController extends Controller
{
    public function index()
    {
        return response()->json(
            RetiradaProduto::with('produto:id,Nome')->orderByDesc('data_retirada')->get()
        );
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'data_retirada' => 'sometimes|required|date',
            'produto_id' => 'required|integer|exists:produto,id',
            'quantidade' => 'required|numeric|gt:0',
            'unidade' => 'required|string|max:50',
            'motivo' => 'required|string|max:255',
            'responsavel' => 'required|string|max:255',
            'observacoes' => 'nullable|string',
        ]);

        $dados['data_retirada'] ??= now();
        $retirada = RetiradaProduto::create($dados);

        return response()->json($retirada->load('produto:id,Nome'), 201);
    }

    public function show(RetiradaProduto $retiradaProduto)
    {
        return response()->json($retiradaProduto->load('produto:id,Nome'));
    }

    public function update(Request $request, RetiradaProduto $retiradaProduto)
    {
        $dados = $request->validate([
            'data_retirada' => 'sometimes|required|date',
            'produto_id' => 'sometimes|required|integer|exists:produto,id',
            'quantidade' => 'sometimes|required|numeric|gt:0',
            'unidade' => 'sometimes|required|string|max:50',
            'motivo' => 'sometimes|required|string|max:255',
            'responsavel' => 'sometimes|required|string|max:255',
            'observacoes' => 'sometimes|nullable|string',
        ]);

        $retiradaProduto->update($dados);

        return response()->json($retiradaProduto->fresh()->load('produto:id,Nome'));
    }

    public function destroy(RetiradaProduto $retiradaProduto)
    {
        $retiradaProduto->delete();

        return response()->noContent();
    }
}
