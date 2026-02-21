<?php

namespace App\Services;

class CheckoutService {

    private string $chave = 'checkout';

    public function inicio() {
        session()->put($this->chave, [
            'itens' => [],
            'endereco' => null,
            'pagamento' => null
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

    public function adicionarPagamento($pagamentoId) {
        session()->put($this->chave . '.pagamento', $pagamentoId);
    }

    public function estaPronto() : bool {

        $checkout = $this->getPedido();

        $pedidoValido = !empty($checkout['itens']) &&
                        !empty($checkout['endereco']) &&
                        !empty($checkout['pagamento']);

        return $pedidoValido;
    }

    public function getPedido() {
        return session()->get($this->chave);
    }


}
