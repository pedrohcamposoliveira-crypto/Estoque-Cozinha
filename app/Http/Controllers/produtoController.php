<?php

namespace App\Http\Controllers;

use App\Models\produto;
use Illuminate\Http\Request;

class produtoController extends Controller
{
    public function cadastro_produto(Request $request)
    {
        return view('cadastro_produto');
    }

    public function salvar_produto(Request $request)
    {
        $dados = $request->validate([
            'categoria_id' => 'required|integer|exists:categoria,id',
            'fornecedor_id' => 'required|integer|exists:fornecedor,id',
            'Nome' => 'required|string|max:255',
            'Numero_Nota' => 'required|string|max:255',
            'Quantidade_entrando' => 'required|integer|min:1',
            'Quantidade_minima' => 'required|integer|min:0',
            'Data_fornecimento' => 'required|date',
            'data_validade' => 'required|date',
            'descricao' => 'required|string',
        ]);

        $dados['Data_fornecimento'] = \DateTime::createFromFormat(
            '!d-m-Y',
            $dados['Data_fornecimento'],
        )->format('Y-m-d');
        $dados['data_validade'] = \DateTime::createFromFormat(
            '!d-m-Y',
            $dados['data_validade'],
        )->format('Y-m-d');

        $produto = produto::create($dados);

        return response()->json(['produto' => $produto, 'erro' => 'n'], 201);
    }

    public function ver_produto(Request $request)
    {
        $dados = $request->validate([
            'id' => 'required|integer|exists:produto,id',
        ]);

        $produto = produto::findOrFail($dados['id']);

        return response()->json(['produto' => $produto, 'erro' => 'n'], 200);
    }

    public function listar_produtos(Request $request)
    {
        $produtos = produto::all();

        return response()->json(['produtos' => $produtos], 200);
    }

    public function listar_produtos_simples(Request $request)
    {
        $produtos = produto::select('id', 'Nome', 'Quantidade_entrando', 'Quantidade_minima')->get();

        return response()->json(['produtos' => $produtos], 200);
    }

    public function alterar_produto(Request $request)
    {
        $dados = $request->validate([
            'id' => 'required|integer|exists:produto,id',
        ]);

        $produto = produto::findOrFail($dados['id']);
        $dados = $request->validate([
            'categoria_id' => 'required|integer|exists:categoria,id',
            'fornecedor_id' => 'required|integer|exists:fornecedor,id',
            'Nome' => 'required|string|max:255',
            'Numero_Nota' => 'required|string|max:255',
            'Quantidade_entrando' => 'required|integer|min:1',
            'Quantidade_minima' => 'required|integer|min:0',
            'Data_fornecimento' => 'required|date',
            'data_validade' => 'required|date',
            'descricao' => 'required|string',
        ]);

        $dados['Data_fornecimento'] = \DateTime::createFromFormat(
            '!d-m-Y',
            $dados['Data_fornecimento'],
        )->format('Y-m-d');
        $dados['data_validade'] = \DateTime::createFromFormat(
            '!d-m-Y',
            $dados['data_validade'],
        )->format('Y-m-d');

        $produto->update($dados);

        return response()->json(['produto' => $produto, 'erro' => 'n'], 200);
    }

    public function deletar_produto(Request $request)
    {
        $dados = $request->validate([
            'id' => 'required|integer|exists:produto,id',
        ]);

        $produto = produto::findOrFail($dados['id']);
        $produto->delete();

        return response()->json(['message' => 'Produto deletado com sucesso!', 'erro' => 'n'], 200);
    }
}
