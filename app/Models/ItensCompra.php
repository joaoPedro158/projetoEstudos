<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItensCompra extends Model
{
    protected $table = 'Itens_compra';

    protected $fillable = [
        'compra_id',
        'produto_id',
        'preco_unitario',
        'quantidade',
    ];

    function compra() {
        return $this->belongsTo(compra::class, 'compra_id');
    }

    public function produto() {
        return $this->belongsTo(Produto::class, 'produto_id');
    }
}
