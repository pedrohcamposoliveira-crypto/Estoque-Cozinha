<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoricoMovimentacao extends Model
{
    protected $table = 'historico_movimentacao';

    protected $fillable = [
        'data_movimentacao',
        'tipo_movimentacao',
        'produto_id',
        'quantidade',
        'unidade',
        'funcionario',
        'observacao',
    ];

    protected function casts(): array
    {
        return [
            'data_movimentacao' => 'datetime',
            'quantidade' => 'decimal:2',
        ];
    }

    public function produto()
    {
        return $this->belongsTo(produto::class, 'produto_id');
    }
}
