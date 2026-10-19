<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeusuarioController extends Controller
{
    public function meu_usuario(Request $request)
    {
        return view('meu_usuario');
    }
}
