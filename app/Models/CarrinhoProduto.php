<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CarrinhoProduto extends Pivot
{
    protected $table = 'carrinho_compra';

    public $incrementing = true;

    protected $casts =[
        'quantidade' => 'integer',
        'created_at' => 'datetime',
    ];
}
