<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;


class GestaoUsuarioController extends Controller
{
    public function gestao_usuario(request $request){
        return view('gestao_usuario');
    }
}
