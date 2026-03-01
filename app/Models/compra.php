<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class compra extends Model
{
    protected $table = 'compra';

    protected $fillable = [
        'user_id',
        'endereco_id',
        'status',
        'id_pagamento',
        'metodo_pagamento',
        'id_ordem_pagamento',
        'referencia_externa'
    ];


    function itensCompra() {
        return $this->hasMany(ItensCompra::class, 'compra_id');
    }

    function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
