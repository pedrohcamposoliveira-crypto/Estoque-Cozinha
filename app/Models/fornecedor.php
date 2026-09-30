<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class fornecedor extends Model
{
    protected $table = 'fornecedor';

    protected $fillable = [
        'nome',
        'telefone',
        'email',
        'endereço'



    ]
}
