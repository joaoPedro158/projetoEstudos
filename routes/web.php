<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\controllerCategoria;
use App\Http\Controllers\CriarContaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FinanciasController;
use App\Http\Controllers\AdicionarProdutoController;
use App\Http\Controllers\ProdutoController;

Route::get('/',[HomeController::class, 'index'])
    ->name('home.index');



Route::get('/categoria', [controllerCategoria::class, 'listaCategoria'])
    ->name('categoria.index');


Route::get('/criar', [CriarContaController::class, 'index'])
    ->name('CriarConta.index');

Route::get('/login', [LoginController::class, 'index'])
    ->name('Login.index');

Route::get('/Financias', [FinanciasController::class, 'index'])
    ->name('Financias.index');

Route::get('/produto', [ProdutoController::class, 'index'])
    ->name('produto.index');

Route::post('/CriarConta', [CriarContaController::class, 'store'])
    ->name('CriarConta.store');

Route::post('/adicionarProduto', [AdicionarProdutoController::class, 'store'])
    ->name('adicionarProduto.store');



    // Rota para adiminsitradores
Route::get('/adicionarProduto', [AdicionarProdutoController::class, 'index'])
    ->name('adicionarProduto.index');

