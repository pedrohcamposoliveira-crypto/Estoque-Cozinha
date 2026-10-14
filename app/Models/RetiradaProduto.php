<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RetiradaProduto extends Model
{
    protected $table = 'retirada_produto';

    protected $fillable = [
        'data_retirada',
        'produto_id',
        'quantidade',
        'unidade',
        'motivo',
        'responsavel',
        'observacoes',
    ];

    protected function casts(): array
    {
        return [
            'data_retirada' => 'datetime',
            'quantidade' => 'decimal:2',
        ];
    }

    public function produto()
    {
        return $this->belongsTo(produto::class, 'produto_id');
    }
}
