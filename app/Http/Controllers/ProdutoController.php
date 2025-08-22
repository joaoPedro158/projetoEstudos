<?php

namespace App\Http\Controllers;

use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\User;

class ProdutoController extends Controller
{
    public function index() {
        return view('produto.adicionarProduto');
    }

   public function store(Request $request) {
        $dadosValidados = $request->validate([
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'preco' => 'required|numeric',
            'estoque' => 'nullable|integer|min:1',
        ]);


        $dadosValidados['user_id'] = auth()->user()->id;


        if ($request->hasFile('imagem')) {
            $caminhoImagem = $request->file('imagem')->store('produtos', 'public');
            $dadosValidados['imagem'] = $caminhoImagem;
        }

        Produto::create($dadosValidados);

        return redirect()->route('adicionarProduto.index')->with('success', 'Produto adicionado com sucesso!');
    }

    public function show($id) {
        $produto = Produto::findOrFail($id);

        $donoProduto = User::where('id', $produto->user_id)->first()->toArray();
        return view('produto.produtoShow', compact('produto', 'donoProduto'));
    }

    public function dashboard(Request $request) {

        $usuario = auth()->user();

        $produtoDoUsuario = $usuario->produtos;


        return view('produto.dashboard', compact('produtoDoUsuario',));
    }

    // public function destroy($id) {
    //     $produto = Produto::findOrFail($id);
    //     $produto->delete();

    //     return redirect('/')->route('produto.Produto.index')->with('success', 'Produto removido com sucesso!');
    // }
}
