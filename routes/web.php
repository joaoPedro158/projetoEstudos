<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FavoritosController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\carinhoCompraController;


Route::get('/',[HomeController::class, 'index'])
    ->name('home.index');

Route::get('/favoritos', [FavoritosController::class, 'index'])
    ->name('favoritos.index');

Route::get('/carinhoCompra', [carinhoCompraController::class, 'index'])
    ->name('carinhoCompra.index');

Route::get('/produto/{id}', [ProdutoController::class, 'show'])
    ->name('produto.show');



    // Rota para logados
Route::get('/adicionarProduto', [ProdutoController::class, 'index'])
    ->middleware('auth')
    ->name('adicionarProduto.index');

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




