<?php

namespace App\Http\Controllers;

use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Request;
use App\Models\Produto;

class AdicionarProdutoController extends Controller
{
    public function index()
    {
        return view('adicionarProduto');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'preco' => 'required|numeric',
        ]);

        // Salvar imagem e pegar caminho
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $caminhoImagem = $request->file('imagem')->store('produtos', 'public');
            $validatedData['imagem'] = $caminhoImagem;
        }

           // Criar o registro no banco
        Produto::create($validatedData);


        // Redirecionar ou retornar uma resposta após salvar o produto
        return redirect()->route('adicionarProduto.index')->with('success', 'Produto adicionado com sucesso!');
    }
}
