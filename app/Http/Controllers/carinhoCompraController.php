<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class carinhoCompraController extends Controller
{
    public function index()
    {
        // Lógica para exibir o carrinho de compras
        return view('carrinhoCompra');
    }
}
