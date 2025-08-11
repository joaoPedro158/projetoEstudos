<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\controllerCategoria;
use App\Http\Controllers\CriarContaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FinanciasController;
use App\Http\Controllers\AdicionarProdutoController;

Route::get('/',[HomeController::class, 'index'])
    ->name('home.index');



Route::get('/categoria', [controllerCategoria::class, 'listaCategoria'])
    ->name('categoria.index');


Route::get('/criar', [CriarContaController::class, 'index'])
    ->name('CriarConta.index');

Route::get('/login', [LoginController::class, 'index'])
    ->name('Login.index');

Route::post('/CriarConta', [CriarContaController::class, 'store'])
    ->name('CriarConta.store');

Route::get('/Financias', [FinanciasController::class, 'index'])
    ->name('Financias.index');

    // Rota para adiminsitradores
Route::get('/adicionarProduto', [AdicionarProdutoController::class, 'adicionarProduto'])
    ->name('adicionarProduto.index');
