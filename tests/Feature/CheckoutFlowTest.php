<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use App\Models\Produto;
use Tests\TestCase;

class CheckoutFlowTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use WithFaker;
    use RefreshDatabase;


    public function test_deve_lancar_excecao_se_carrinho_estiver_vazio(): void {

        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('checkout.finalizarcompra'));

        $response->assertSessionHas('error', 'Seu carrinho está vazio.');
    }

   public function test_deve_lancar_excecao_se_estoque_for_insuficiente()
    {
        $user = User::factory()->create();
        $produto = Produto::factory()->create(['estoque' => 2, 'nome' => 'Teclado']);

        $chaveSessao = 'checkout';

        

        $dadosDoPedido = [
            'itens' => [
                [
                    'id' => $produto->id,
                    'quantidade' => 5,
                    'nome' => 'Teclado',
                    'preco' => 100
                ]
            ],
            'endereco' => ['id' => 1]
        ];

        $response = $this->actingAs($user)
            ->withSession([$chaveSessao => $dadosDoPedido])
            ->get(route('checkout.finalizarcompra'));

        $response->assertSessionHas('error', "Estoque insuficiente para 'Teclado'. Temos apenas 2 unidades.");
    }
}
