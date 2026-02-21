<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FavoritosController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\carinhoCompraController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\EnderecoController;

Route::get('/',[HomeController::class, 'index'])
    ->name('home.index');


    //rotas farovitos
Route::get('/favoritos', [FavoritosController::class, 'index'])
    ->name('favoritos.index')
    ->middleware('auth');

Route::post('/favoritos/adicionar', [FavoritosController::class, 'adicionar'])
    ->name('favoritos.adicionar');

Route::post('/favoritos/remover', [FavoritosController::class, 'remover'])
    ->name('favoritos.remover');

    // rotas porduto
Route::get('/adicionarProduto', [ProdutoController::class, 'index'])
    ->middleware('auth')
    ->name('adicionarProduto.index');

Route::get('/produto/{id}', [ProdutoController::class, 'show'])
    ->name('produto.show');

Route::post('/adicionarProduto', [ProdutoController::class, 'store'])
    ->name('adicionarProduto.store');

Route::delete('/produto/{id}', [ProdutoController::class, 'destroy'])
    ->middleware('auth')
    ->name('produto.destroy');

Route::get('/produto/edit/{id}', [ProdutoController::class, 'edit'])
    ->middleware('auth')
    ->name('produto.edit');

Route::put('/produto/update/{id}', [ProdutoController::class, 'update'])
    ->name('produto.update');


Route::get('/dashboard', [ProdutoController::class, 'dashboard'])
    ->middleware('auth')
    ->name('Dashboard');

     //carrinho de compra
Route::post('/carrinho-ajax', [carinhoCompraController::class, 'store'])
    ->name('carrinhoAjax')
    ->middleware('auth');

Route::get('/carinhoCompra', [carinhoCompraController::class, 'index'])
    ->name('carinhoCompra.index')
    ->middleware('auth');

Route::delete('/carrinho/excluir/{produtoId}', [carinhoCompraController::class, 'destroy'])
    ->name('carrinho.excluir')
    ->middleware('auth');

    //endereco
Route::get('/endereco', [EnderecoController::class, 'index'])
    ->name('endereco.index')
    ->middleware('auth');

Route::get('/cadastrarEndereco', [EnderecoController::class, 'pageCadastraEndereco'])
    ->name('cadastrarEndereco.index')
    ->middleware('auth');

Route::post('/cadastrarEndereco/store', [EnderecoController::class, 'store'])
    ->name('endereco.store')
    ->middleware('auth');

    //checkout
Route::post('/checkout/adicionarItem', [CheckoutController::class, 'adicionarItemCheckout'])
    ->name('checkout.adicionarItem')
    ->middleware('auth');
