<?php

namespace App\Services;

use App\DTOs\CheckoutPedidoDTO;
use App\DTOs\PagamentoRespostaDTO;
use App\Interface\RegistraCompra;
use App\Models\compra;
use App\Models\ItensCompra;
use App\Models\Produto;
use Exception;
use Illuminate\Support\Facades\DB;

class RegistraCompraServiceImpl implements RegistraCompra {

    public function registrarCompra(CheckoutPedidoDTO $dto) {

        return DB::transaction(function () use ($dto) {
            $novaCompra = Compra::create([
            'user_id' => auth()->id(),
            'endereco_id' => $dto->enderecoId,
            'status' => 'pendente'
        ]);

        foreach($dto->itens as $item) {
            ItensCompra::create([
                'compra_id' => $novaCompra->id,
                'produto_id' => $item['id'],
                'quantidade' => $item['quantidade'],
                'preco_unitario' => $item['preco']
            ]);
        }
            return $novaCompra->id;
        });


    }


    public function ConfirmarCompra(PagamentoRespostaDTO $dto) {
        $compra = Compra::where('id', $dto->referencia)->first();

        if (!$compra) {
            throw new Exception("Compra com a referência {$dto->referencia} não encontrada.");
        }

        $compra->update([
            'status' => 'confirmada',
            'id_pagamento' => $dto->pagamentoId,
            'metodo_pagamento' => $dto->metodoPagamento,
            'id_ordem_pagamento' => $dto->idOrdemPagamento
            ]);

            $this->diminuirEstoque($compra->id);
    }

    private function diminuirEstoque(int $idCompra) {
        $itens = ItensCompra::where('compra_id', $idCompra)->get();

        foreach($itens as $item) {
            Produto::where('id', $item->produto_id)
                ->decrement('estoque', $item->quantidade);
        }

    }
}
