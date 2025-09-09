<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto; // Adicione este import

class HomeController extends Controller
{
    public function index() {
        $busca = request('busca');

        if ($busca) {
            $produto = Produto::where([
                ['nome', 'like', '%'.$busca.'%']
            ])->get();
        } else {
            $produto = Produto::all();
        }

        $produtoDestaque =Produto::orderBydesc('preco')
            ->take(8)
            ->get()
            ->chunk(4);


        return view('home', compact('produto', 'busca', 'produtoDestaque'));
    }
}
