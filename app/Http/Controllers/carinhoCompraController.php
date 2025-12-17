<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Traits\Dumpable;

class carinhoCompraController extends Controller
{
    public function index() {
        $usuario = auth()->user();

        $carrinhoCompra = $usuario->produtoCarrinho;
        return view('carrinhoCompra', compact('carrinhoCompra'));
    }
    public function store(Request $request) {
        $userId = auth()->id();

          // 3. Verifica se já foi adicionado antes
        $jaExiste = DB::table('carrinho_compra')
            ->where('user_id', $userId)
            ->where('produto_id', $request->produto_id)
            ->exists();

        if ($jaExiste) {
           return response()->json([
            'status' => 'info',
            'message' => 'Produto já está no carrinho de compras.'
        ]);
        }

        // 4. Insere na tabela pivô
        DB::table('carrinho_compra')->insert([
            'user_id' => $userId,
            'produto_id' => $request->produto_id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return response()->json([
        'status' => 'success',
        'message' => 'Produto adicionado ao carrinho com sucesso!'
    ]);


    }
}
