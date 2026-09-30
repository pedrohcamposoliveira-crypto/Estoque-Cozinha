<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class categoriaController extends Controller
{
    public function cadastro(request $request){
        return view('cadastro');
    }
}
