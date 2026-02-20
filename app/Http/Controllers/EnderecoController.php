<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnderecoRequest;
use App\Models\Endereco;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    public function index() {
        $enderecos = Endereco::where('user_id', auth()->id())->get();

        return view('endereco.selecionarEndereco', compact('enderecos'));
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
}
