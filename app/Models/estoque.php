<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class estoque extends Model
{
    protected $table = 'estoque';

    protected $fillable = [
        'produto_id',
        'quantidade_atual',
        'quantidade_minima',
        'data_ultima_atualização'



    ]
}
