<?php

namespace App\Http\Controllers;

use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\User;

class ProdutoController extends Controller
{
    public function index() {
        return view('adicionarProduto');
    }

   public function store(Request $request) {
        $dadosValidados = $request->validate([
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'preco' => 'required|numeric',
        ]);


        $dadosValidados['user_id'] = auth()->user()->id;


        if ($request->hasFile('imagem')) {
            $caminhoImagem = $request->file('imagem')->store('produtos', 'public');
            $dadosValidados['imagem'] = $caminhoImagem;
        }

        // Cria o produto com todos os dados, incluindo o user_id
        Produto::create($dadosValidados);

        return redirect()->route('adicionarProduto.index')->with('success', 'Produto adicionado com sucesso!');
    }

    public function show($id) {
        $produto = Produto::findOrFail($id);

        $donoProduto = User::where('id', $produto->user_id)->first()->toArray();
        return view('produtoShow', compact('produto', 'donoProduto'));
    }
}
