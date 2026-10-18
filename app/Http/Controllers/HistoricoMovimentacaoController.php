<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoricoMovimentacaoController extends Controller
{
     public function historico_movimentacao(request $request){
        return view('historico_movimentacao');
    }
}
