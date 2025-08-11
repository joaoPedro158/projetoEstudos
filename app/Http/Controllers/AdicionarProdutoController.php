<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdicionarProdutoController extends Controller
{
    public function adicionarProduto()
    {
        return view('adicionarProduto');
    }
}
