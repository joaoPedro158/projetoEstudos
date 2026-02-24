<?php

namespace App\DTOs;

readonly class CheckoutResumoDto {
    public function __construct(

        public float $totalGeral,
        public int $quantidadeTotal,
    ) {}

    public static function fromArray(array $dados) : self {
        $colecao = collect($dados['itens']);

        return new self(

            totalGeral: $colecao->sum(fn($i) => $i["precoUnitario"] * $i["quantidade"]),
            quantidadeTotal: $colecao->sum('quantidade')

        );
    }
}
