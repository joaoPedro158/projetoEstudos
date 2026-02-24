<?php

namespace App\Interface;

interface PagamentoInterface
{
    /**
     * @param array $produtos Lista de produtos da sessão
     * @param string $pedidoId ID único do pedido
     * @return string URL para redirecionar o usuário para pagar
     */
    public function gerarLinkPagamento(array $produtos, string $pedidoId): string;
}
