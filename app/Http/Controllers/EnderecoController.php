<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnderecoRequest;
use App\Models\Endereco;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    public function index()
    {
        return view('endereco.selecionarEndereco');
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
