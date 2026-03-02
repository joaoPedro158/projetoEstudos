<?php

namespace App\DTOs;

readonly class CheckoutPedidoDTO {
    public function __construct(
        public array $itens,
        public string $enderecoId
    ) {}

    public static function fromSession(array $dados) : self {
        $itensFormatados = collect($dados["itens"])->map(fn($item) =>[
            'id' => $item['id'],
            'preco' =>(float) $item['precoUnitario'],
            'quantidade' =>(int) $item['quantidade'],
            'titulo' => "Produto #". $item['id']
        ]);

        return new self(
            itens: $itensFormatados->toArray(),
            enderecoId: $dados['endereco']
        );
    }
 }
