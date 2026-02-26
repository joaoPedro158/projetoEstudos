<?php

namespace App\Services;

use App\DTOs\CheckoutResumoDto;

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

    public function estaPronto() : bool {

        $checkout = $this->getPedido();

        $pedidoValido = !empty($checkout['itens']) &&
                        !empty($checkout['endereco']);

        return $pedidoValido;
    }

    public function getPedido() {
        return session()->get($this->chave);
    }

    public function pedidoDTO() {
        $checkout = $this->getPedido();

        return CheckoutResumoDto::fromArray($checkout);
    }

    

}
