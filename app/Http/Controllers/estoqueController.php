<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class estoqueController extends Controller
{
    public function estoque(request $request){
        return view('estoque');
    }
}
