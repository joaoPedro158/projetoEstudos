<?php

namespace App\Interface;

use App\DTOs\CheckoutPedidoDTO;
use App\DTOs\PagamentoRespostaDTO;

interface RegistraCompra {

    public function registrarCompra(CheckoutPedidoDTO $dto);
    public function ConfirmarCompra(PagamentoRespostaDTO $dto);
}
