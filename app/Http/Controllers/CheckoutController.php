<?php

namespace App\Http\Controllers;

use App\DTOs\CheckoutPedidoDto;
use App\Interface\PagamentoInterface;
use App\Services\CheckoutService;
use Exception;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function adicionarItemCheckout(Request $request, CheckoutService $checkoutService) {
        $produtoId = (array) $request->input('produto_id', []);

        $checkoutService->inicio();
        foreach ($produtoId as $id) {
            $checkoutService->adicionarItem($id);
        }
    }

    public function adicioanrEnderecoCheckout($enderecoId, CheckoutService $checkoutService) {
        $checkoutService->adicionarEndereco($enderecoId);
    }

    public function finalizarCheckout(CheckoutService $checkoutService, PagamentoInterface $pagamentoService,) {
        try{
            $checkoutService->validarCheckout();
            $dadosSessão = $checkoutService->getPedido();
            $dto = CheckoutPedidoDto::fromSession($dadosSessão);
            $link = $pagamentoService->criarPreferencia($dto);
            return redirect()->away($link);
        }catch(Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }


    }
}
