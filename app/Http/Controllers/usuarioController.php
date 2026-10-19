<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class usuarioController extends Controller
{
    public function cadastro(Request $request)
    {
        return view('cadastro');
    }

    public function cadastro_usuario(Request $request)
    {

        // Valida o JSON bruto para não depender do Content-Type da requisição.
        $dadosJson = json_decode($request->getContent(), true);
        $dados = is_array($dadosJson) ? $dadosJson : $request->all();

        $dados = Validator::make($dados, [
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuario,email',
            'senha' => 'required|string|min:8',
            'cpf' => 'required|string|max:14|unique:usuario,cpf',
            'NIF' => 'required|string|unique:usuario,NIF',
        ])->validate();

        try {
            $usuario = new usuario;
            $usuario->nome = $dados['nome'];
            $usuario->email = $dados['email'];
            $usuario->senha = Hash::make($dados['senha']);
            $usuario->cpf = $dados['cpf'];
            $usuario->NIF = $dados['NIF'];
            $usuario->save();

            return response()->json(['message' => 'Usuário cadastrado com sucesso!', 'erro' => 'n'], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Erro ao cadastrar usuário!',
                'erro' => 's',
                'msg_erro' => $th->getMessage(),
            ], 500);
        }
    }

    public function ver_usuario(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:usuario,id',
        ]);

        $usuario = usuario::select('id', 'nome', 'email', 'cpf', 'NIF')->find($request->input('id'));

        return response()->json(['usuario' => $usuario, 'erro' => 'n'], 200);
    }

    public function listar_usuarios(Request $request)
    {
        $usuarios = usuario::select('id', 'nome', 'email', 'cpf', 'NIF')->get();

        return response()->json(['usuarios' => $usuarios], 200);
    }

    public function listar_usuarios_simples(Request $request)
    {
        $usuarios = usuario::select('id', 'nome', 'email')->get();

        return response()->json(['usuarios' => $usuarios], 200);
    }

    public function alterar_usuario(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:usuario,id',
        ]);

        $usuario = usuario::find($request->input('id'));

        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuario,email,'.$usuario->id,
            'senha' => 'required|string|min:8',
        ]);

        try {
            $usuario->nome = $request->input('nome');
            $usuario->email = $request->input('email');
            $usuario->senha = Hash::make($request->input('senha'));
            $usuario->save();

            return response()->json(['message' => 'Usuário alterado com sucesso!', 'erro' => 'n'], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Erro ao alterar usuário!',
                'erro' => 's',
                'msg_erro' => $th->getMessage(),
            ], 500);
        }
    }

    public function deletar_usuario(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:usuario,id',
        ]);

        try {
            $usuario = usuario::find($request->input('id'));
            $usuario->delete();

            return response()->json(['message' => 'Usuário deletado com sucesso!', 'erro' => 'n'], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Erro ao deletar usuário!',
                'erro' => 's',
                'msg_erro' => $th->getMessage(),
            ], 500);
        }
    }
}
