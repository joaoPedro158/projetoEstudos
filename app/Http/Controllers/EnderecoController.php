<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnderecoRequest;
use App\Models\Endereco;
use App\Services\CheckoutService;
use Illuminate\Http\Request;
use Nette\Utils\Json;

class EnderecoController extends Controller
{
    public function index(CheckoutService $checkoutService) {
        $enderecos = Endereco::where('user_id', auth()->id())->get();
        $checkoutPedido = $checkoutService->pedidoDTO();
        dump($checkoutPedido);
        
        return view('endereco.selecionarEndereco', compact('enderecos', 'checkoutPedido'));
    }



    public function pageCadastraEndereco() {
        return view('endereco.cadastraEndereco');
    }

    public function store(EnderecoRequest $enderecoRequest) {
        $dadosValidados = $enderecoRequest->validated();

        $dadosValidados['user_id'] = auth()->id();

        Endereco::create($dadosValidados);

        return redirect()->route('home.index')->with('success', 'Endereço cadastrado com sucesso!');
    }
    public function edit($enderecoId) {
        $endereco = Endereco::where('user_id', auth()->id())->findOrFail($enderecoId);

        return view('endereco.atualizarEndereco', compact('endereco'));
    }

    public function update(EnderecoRequest $enderecoRequest, $enderecoId) {
        $dadosValidados = $enderecoRequest->validated();

        $endereco = Endereco::where('user_id', auth()->id())->findOrFail($enderecoId);

        $endereco->update($dadosValidados);

        return redirect()->route('home.index')->with('success', 'Endereço atualizado com sucesso!');
    }
}
