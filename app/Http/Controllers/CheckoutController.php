<?php

namespace App\Http\Controllers;

use App\DTOs\CheckoutPedidoDto;
use App\Interface\PagamentoInterface;
use App\Interface\RegistraCompra;
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

    public function finalizarCheckout(CheckoutService $checkoutService,
                                     PagamentoInterface $pagamentoService,
                                     RegistraCompra $registraCompraService) {
        try{
            $checkoutService->validarCheckout();
            $dadosSessão = $checkoutService->getPedido();
            $dto = CheckoutPedidoDto::fromSession($dadosSessão);
            $idCompra = $registraCompraService->registrarCompra($dto);
            $link = $pagamentoService->criarPreferencia($dto, $idCompra);
            // return redirect()->away($link);
            return redirect('/pagamento/sucesso?collection_id=12345&collection_status=approved&payment_id=148559209788&status=approved&external_reference='.$idCompra.'&payment_type=credit_card&merchant_order_id=987654321');
        }catch(Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }


    }
}
