<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagamentoController extends Controller
{
    public function sucesso(Request $request)  {
        $dadosMP = [
            'pagamento_id' => $request->query('payment_id'),
            'status' => $request->query('status'),
            'referencia' => $request->query('external_reference')
        ];

        return view('pagamento.sucesso', compact('dadosMP'));
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
