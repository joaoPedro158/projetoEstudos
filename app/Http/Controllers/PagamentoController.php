<?php

namespace App\Http\Controllers;

use App\DTOs\PagamentoRespostaDTO;
use App\Services\RegistraCompraService;
use Illuminate\Http\Request;

class PagamentoController extends Controller
{
    public function sucesso(Request $request,
        RegistraCompraService $registraCompraService ) {

        $dto = PagamentoRespostaDTO::fromRequest($request);

        $registraCompraService->ConfirmarCompra($dto);

        dump($dto);
        return view('pagamento.sucesso');
    }

    public function falha(Request $request) {

        $motivo = $request->query('status') ?? 'Desconecido';
        return view('pagamento.falha', compact('motivo'));
    }

    public function pendente(Request $request) {
        $pagamentoId = $request->query('payment_id');

        return view('pagamento.pendente', compact('pagamentoId'));
    }
}
