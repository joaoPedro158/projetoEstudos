<?php

namespace App\Interface;

use App\DTOs\CheckoutPedidoDto;
use App\DTOs\ChekoutPedidoDTO;

interface PagamentoInterface
{

    public function criarPreferencia(CheckoutPedidoDTO $dto);
}
