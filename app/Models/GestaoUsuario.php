<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GestaoUsuario extends Model
{
    protected $table = 'gestao_usuarios';

    protected $fillable = [
        'usuario_id',
        'perfil',
        'status',
        'ultimo_acesso',
        'unidade',
    ];

    protected function casts(): array
    {
        return [
            'ultimo_acesso' => 'datetime',
        ];
    }

    public function usuario()
    {
        return $this->belongsTo(usuario::class, 'usuario_id');
    }
}
