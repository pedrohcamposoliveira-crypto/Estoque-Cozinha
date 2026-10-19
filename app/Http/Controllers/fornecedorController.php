<?php

namespace App\Http\Controllers;

use App\Models\fornecedor;
use Illuminate\Http\Request;

class fornecedorController extends Controller
{
    public function cadastro_fornecedor(Request $request)
    {
        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'required|string|max:11',
            'email' => 'required|string|email|max:255|unique:fornecedor,email',
            'CNPJ' => 'required|string|max:14|unique:fornecedor,CNPJ',
            'endereço' => 'required|string|max:255',
        ]);

        $fornecedor = fornecedor::create($dados);

        return response()->json(['fornecedor' => $fornecedor, 'erro' => 'n'], 201);
    }

    public function ver_fornecedor(Request $request)
    {
        $dados = $request->validate([
            'id' => 'required|integer|exists:fornecedor,id',
        ]);

        $fornecedor = fornecedor::findOrFail($dados['id']);

        return response()->json(['fornecedor' => $fornecedor, 'erro' => 'n'], 200);
    }

    public function listar_fornecedores(Request $request)
    {
        $fornecedores = fornecedor::all();

        return response()->json(['fornecedores' => $fornecedores], 200);
    }

    public function listar_fornecedores_simples(Request $request)
    {
        $fornecedores = fornecedor::select('id', 'nome', 'email')->get();

        return response()->json(['fornecedores' => $fornecedores], 200);
    }

    public function alterar_fornecedor(Request $request)
    {
        $dados = $request->validate([
            'id' => 'required|integer|exists:fornecedor,id',
        ]);

        $fornecedor = fornecedor::findOrFail($dados['id']);
        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'required|string|max:11',
            'email' => 'required|string|email|max:255|unique:fornecedor,email,'.$fornecedor->id,
            'CNPJ' => 'required|string|max:14|unique:fornecedor,CNPJ,'.$fornecedor->id,
            'endereço' => 'required|string|max:255',
        ]);

        $fornecedor->update($dados);

        return response()->json(['fornecedor' => $fornecedor, 'erro' => 'n'], 200);
    }

    public function deletar_fornecedor(Request $request)
    {
        $dados = $request->validate([
            'id' => 'required|integer|exists:fornecedor,id',
        ]);

        $fornecedor = fornecedor::findOrFail($dados['id']);
        $fornecedor->delete();

        return response()->json(['message' => 'Fornecedor deletado com sucesso!', 'erro' => 'n'], 200);
    }
}
