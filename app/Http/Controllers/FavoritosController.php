<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class FavoritosController extends Controller
{
     public function index()
    {
        $usuario = auth()->user();

        $favoritos = $usuario->favoritos()->get();

        return view('favoritos', compact('favoritos'));
    }

    public function adicionar(Request $request){
        $usuario = auth()->user();
        $produtoId = $request->input('produto_id');
        $usuario->favoritos()->attach($produtoId);

        return back()->with('success', 'Produto adicionado aos favoritos!');
    }

    public function remover(Request $request){
        $usuario = auth()->user();
        $produtoId = $request->input('produto_id');
        $usuario->favoritos()->detach($produtoId);

        return back()->with('success', 'Produto removido dos favoritos!');
    }




}
