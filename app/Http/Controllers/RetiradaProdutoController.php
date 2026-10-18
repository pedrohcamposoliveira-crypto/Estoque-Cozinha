<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RetiradaProdutoController extends Controller
{
     public function retirada_produto(request $request){
        return view('retirada_produto');
    }
}
