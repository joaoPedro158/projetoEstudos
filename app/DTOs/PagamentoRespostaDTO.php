<?php

namespace App\DTOs;

use Illuminate\Http\Request;

readonly class PagamentoRespostaDTO {
    public function __construct(

        public string $referencia,
        public string $pagamentoId,
        public string $status,
        public string $metodoPagamento,
        public string $idOrdemPagamento
    ) {}

    public static function fromRequest(Request $request) : self {
        return new self(

            referencia: $request->query('external_reference', ''),
            pagamentoId: $request->query('payment_id', ''),
            status: $request->query('status', ''),
            metodoPagamento: $request->query('payment_type', ''),
            idOrdemPagamento: $request->query('merchant_order_id', '')

        );
    }
}
