<?php

namespace App\Http\Controllers;

use App\Models\GestaoUsuario;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GestaoUsuarioController extends Controller
{
    public function index()
    {
        return response()->json(
            GestaoUsuario::with('usuario:id,nome,email')->get()
        );
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'usuario_id' => 'required|integer|exists:usuario,id|unique:gestao_usuarios,usuario_id',
            'perfil' => 'sometimes|required|string|max:100',
            'status' => ['sometimes', 'required', Rule::in(['Ativo', 'Bloqueado'])],
            'ultimo_acesso' => 'sometimes|nullable|date',
            'unidade' => 'sometimes|nullable|string|max:255',
        ]);

        $gestaoUsuario = GestaoUsuario::create($dados);

        return response()->json($gestaoUsuario->load('usuario:id,nome,email'), 201);
    }

    public function show(GestaoUsuario $gestaoUsuario)
    {
        return response()->json($gestaoUsuario->load('usuario:id,nome,email'));
    }

    public function update(Request $request, GestaoUsuario $gestaoUsuario)
    {
        $dados = $request->validate([
            'usuario_id' => [
                'sometimes',
                'required',
                'integer',
                'exists:usuario,id',
                Rule::unique('gestao_usuarios', 'usuario_id')->ignore($gestaoUsuario->id),
            ],
            'perfil' => 'sometimes|required|string|max:100',
            'status' => ['sometimes', 'required', Rule::in(['Ativo', 'Bloqueado'])],
            'ultimo_acesso' => 'sometimes|nullable|date',
            'unidade' => 'sometimes|nullable|string|max:255',
        ]);

        $gestaoUsuario->update($dados);

        return response()->json($gestaoUsuario->fresh()->load('usuario:id,nome,email'));
    }

    public function destroy(GestaoUsuario $gestaoUsuario)
    {
        $gestaoUsuario->delete();

        return response()->noContent();
    }
}
