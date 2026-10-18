<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class produtoController extends Controller
{
     public function cadastro_produto(request $request){
        return view('cadastro_produto');
    }
}
