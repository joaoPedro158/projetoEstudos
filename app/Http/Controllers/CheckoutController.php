<?php

namespace App\Http\Controllers;

use App\Services\CheckoutService;
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
}
