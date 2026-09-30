<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class produto extends Model
{
    protected $table = 'produto';

    protected $fillable = [
        'categoria_id',
        'fornecedor_id',
        'Nome',
        'Unidade_medida'
        'Data_fornecimento'
        'data_validade'
        'descricao'



    ]
}
