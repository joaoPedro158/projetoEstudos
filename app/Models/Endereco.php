<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = 'endereco';

    protected $fillable = [
        'user_id',
        'cep',
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'estado',
        'tipo',
        'principal'
    ];

    /**
     * Relacionamento: O endereço pertence a um usuário
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
