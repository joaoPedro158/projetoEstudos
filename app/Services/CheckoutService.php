<?php

namespace App\Services;

use App\DTOs\CheckoutResumoDto;
use App\Models\Endereco;
use Exception;

class CheckoutService {

    private string $chave = 'checkout';

    public function inicio() {
        session()->put($this->chave, [
            'itens' => [],
            'endereco' => null
        ]);
    }

    public function limpar() {
        session()->forget($this->chave);
    }

    public function adicionarItem($produtoId) {
        session()->push($this->chave . '.itens', $produtoId);
    }

    public function adicionarendereco($enderecoId) {
        session()->put($this->chave . '.endereco', $enderecoId);
    }

    public function validarCheckout() {

        $checkout = $this->getPedido();
        dump($checkout);
        if (empty($checkout['itens'])) {
            throw new Exception("Seu carrinho está vazio.");
        }
       if (empty($checkout['endereco'])) {
            throw new Exception("Endereço de entrega não selecionado.");
        }

        $enderecoId = $checkout['endereco'];
        $exists = Endereco::where('id', $enderecoId)
                    ->where('user_id', auth()->id())
                    ->exists();

        if (!$exists) {
            throw new \Exception("O endereço selecionado é inválido ou não pertence à sua conta.");
        }


        foreach ($checkout['itens'] as $item) {
            $produto = \App\Models\Produto::find($item['id']);

            if (!$produto) {
                throw new \Exception("O produto '{$item['nome']}' não está mais disponível.");
            }

            if ($produto->estoque < $item['quantidade']) {
                throw new \Exception("Estoque insuficiente para '{$item['nome']}'. Temos apenas {$produto->estoque} unidades.");
            }
        }
    }

    public function getPedido() {
        return session()->get($this->chave);
    }

    public function pedidoDTO() {
        $checkout = $this->getPedido();

        return CheckoutResumoDto::fromArray($checkout);
    }



}
