<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class carinhoCompraController extends Controller
{
    public function index() {
        $carinhoCompra = Produto::all();

        return view('carrinhoCompra', [
            'carinhoCompra' => $carinhoCompra
        ]);
    }
}
