<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usuario;
use Illuminate\Support\Facades\Hash;

class usuarioController extends Controller
{


    public function cadastro_usuario(Request $request){
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'cpf' => 'required|string|max:14|unique:users',
            'senha' => 'required|string|min:8|confirmed',
        ]);

        try{
            $usuario = new usuario();
            $usuario->nome = $request->input('nome');
            $usuario->email = $request->input('email');
            $usuario->cpf = $request->input('cpf');
            $usuario->senha = Hash::make($request->input('senha'));
            $usuario->save();

            return response()->json(['message' => 'Usuário cadastrado com sucesso'], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Ocorreu um erro ao cadastrar o usuário: ' . $th->getMessage()], 500);
        }
    }

    public function ver_usuario(Request $request){
       $usuario = usuario::find($request->id);
       return response()->json(['usuario' => $usuario, 'error' => 'n'] 200);
    }
}
