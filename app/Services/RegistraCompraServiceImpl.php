<?php

namespace App\Services;

use App\DTOs\PagamentoRespostaDTO;
use App\Interface\RegistraCompra;
use App\Models\compra;
use App\Models\ItensCompra;
use Exception;

class RegistraCompraService  {

    public function registrarCompra(array $dto) {
        $novaCompra = Compra::create([
            'user_id' => auth()->id(),
            'endereco_id' => $dto['endereco_id'],
            'status' => 'pendente'
        ]);

        foreach($dto['itens'] as $item) {
            ItensCompra::create([
                'compra_id' => $novaCompra->id,
                'produto_id' => $item['produto_id'],
                'quantidade' => $item['quantidade'],
                'preco_unitario' => $item['preco_unitario']
            ]);
        }
        return;
    }


    public function ConfirmarCompra(PagamentoRespostaDTO $dto) {
        $compra = Compra::where('id_endereco', $dto->referencia)->fist();

        if (!$compra) {
            throw new Exception("Compra com a referência {$dto->referencia} não encontrada.");
        }

        $compra->update([
            'status' => 'confirmada',
            'id_pagamento' => $dto->pagamentoId,
            'metodo_pagamento' => $dto->metodoPagamento,
            'id_ordem_pagamento' => $dto->idOrdemPagamento
            ]);
    }
}
