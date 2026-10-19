<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use Illuminate\Http\Request;

class categoriaController extends Controller
{
    public function salvar_categoria(Request $request)
    {
        $dados = $request->validate([
            'nome_categoria' => 'required|string|max:255',
            'Descricao' => 'required|string|max:255',
        ]);

        $categoria = categoria::create($dados);

        return response()->json(['categoria' => $categoria, 'erro' => 'n'], 201);
    }

    public function ver_categoria(Request $request)
    {
        $dados = $request->validate([
            'id' => 'required|integer|exists:categoria,id',
        ]);

        $categoria = categoria::findOrFail($dados['id']);

        return response()->json(['categoria' => $categoria, 'erro' => 'n'], 200);
    }

    public function listar_categorias(Request $request)
    {
        $categorias = categoria::all();

        return response()->json(['categorias' => $categorias], 200);
    }

    public function listar_categorias_simples(Request $request)
    {
        $categorias = categoria::select('id', 'nome_categoria')->get();

        return response()->json(['categorias' => $categorias], 200);
    }

    public function alterar_categoria(Request $request)
    {
        $dados = $request->validate([
            'id' => 'required|integer|exists:categoria,id',
        ]);

        $categoria = categoria::findOrFail($dados['id']);
        $dados = $request->validate([
            'nome_categoria' => 'sometimes|required|string|max:255',
            'Descricao' => 'sometimes|required|string|max:255',
        ]);

        $categoria->update($dados);

        return response()->json(['categoria' => $categoria, 'erro' => 'n'], 200);
    }

    public function deletar_categoria(Request $request)
    {
        $dados = $request->validate([
            'id' => 'required|integer|exists:categoria,id',
        ]);

        $categoria = categoria::findOrFail($dados['id']);
        $categoria->delete();

        return response()->json(['message' => 'Categoria deletada com sucesso!', 'erro' => 'n'], 200);
    }
}
