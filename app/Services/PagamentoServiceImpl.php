<?php

namespace App\Services;

use App\Interface\PagamentoInterface;
use MercadoPago\SDK;
use MercadoPago\Preference;

class PagamentoServiceImpl implements PagamentoInterface{

    public function __construct() {
        SDK::setAccessToken(env('MERCADOPAGO_ACCESS_TOKEN'));
    }

    public function gerarLinkPagamento(array $produtos, string $pedidoId): string {

        // logica para criar a preferência de pagamento no MercadoPago
    }
}
