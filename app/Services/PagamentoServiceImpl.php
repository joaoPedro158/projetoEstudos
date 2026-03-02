<?php

namespace App\Services;


use App\DTOs\CheckoutPedidoDTO;
use App\Interface\PagamentoInterface;
use Exception;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Preference\PreferenceClient;


class PagamentoServiceImpl implements PagamentoInterface{

    public function __construct() {

        MercadoPagoConfig::setAccessToken(config('services.mercadopago.token'));
    }

    public function criarPreferencia(CheckoutPedidoDTO $dto, int $idCompra) {
        try {
            $cliente = new PreferenceClient();

            $itensMP = [];
          foreach($dto->itens as $item) {
                $itensMP[] = [
                    "id" => (string) $item['id'],
                    "title" => $item['titulo'],
                    "quantity" => (int) $item['quantidade'],
                    "unit_price" => (float) $item['preco'],
                    "currency_id" => "BRL",
                ];
            }

            $request = [
                "items" => $itensMP,
                "payer" => [
                    "name" => auth()->user()->name,
                    "email" => auth()->user()->email,
                ],
                "external_reference" => (string) $idCompra,
                "back_urls" => [
                 "success" => route('pagamento.sucesso'),
                "failure" => route('pagamento.falha'),
                "pending" => route('pagamento.pendente'),
                ],

                // "auto_return" => "approved",
            ];

            $preferencia = $cliente->create($request);

            return $preferencia->init_point;


        } catch (Exception $e) {
           if (method_exists($e, 'getApiResponse')) {
        $response = $e->getApiResponse();
        dd([
            'status_code' => $response->getStatusCode(),
            'content' => $response->getContent(),
        ]);
    }

    dd($e);
        }



    }
}
