<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class fornecedorController extends Controller
{
     public function cadastro_fornecedor(request $request){
        return view('cadastro_fornecedor');
    }
}
