<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cadastro_usuarioController extends Controller
{
    public function cadastro_usuario(request $request){
        return view('cadastro_usuario');
    }
}
