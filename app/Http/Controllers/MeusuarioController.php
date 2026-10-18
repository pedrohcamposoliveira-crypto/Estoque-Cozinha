<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeusuarioController extends Controller
{
      public function meu_usuario(request $request){
        return view('meu_usuario');
    }
}
