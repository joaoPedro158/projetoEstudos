<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FinanciasController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\carinhoCompraController;


Route::get('/',[HomeController::class, 'index'])
    ->name('home.index');

Route::get('/Financias', [FinanciasController::class, 'index'])
    ->name('Financias.index');

Route::get('/carinhoCompra', [carinhoCompraController::class, 'index'])
    ->name('carinhoCompra.index');

Route::get('/produto/{id}', [ProdutoController::class, 'show'])
    ->name('produto.show');

Route::delete('/produto/{id}', [ProdutoController::class, 'destroy'])
    ->name('produto.destroy');

    // Rota para logados
Route::get('/adicionarProduto', [ProdutoController::class, 'index'])
    ->middleware('auth')
    ->name('adicionarProduto.index');

Route::post('/adicionarProduto', [ProdutoController::class, 'store'])
    ->name('adicionarProduto.store');

Route::get('/dashboard', [ProdutoController::class, 'dashboard'])
    ->middleware('auth')
    ->name('Dashboard');




