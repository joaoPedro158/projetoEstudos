<?php

namespace App\DTOs;

readonly class CheckoutResumoDto {
    public function __construct(
        public array $itens,
        public float $totalGeral,
        public int $quantidadeTotal,
    ) {}

    public static function fromArray(array $dados) : self {
        $colecao = collect($dados['itens']);

        return new self(
            itens: $dados['itens'],
            totalGeral: $colecao->sum(fn($i) => $i["precoUnitario"] * $i["quantidade"]),
            quantidadeTotal: $colecao->sum('quantidade')

        );
    }
}
