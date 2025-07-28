<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\controllerCategoria;
use App\Http\Controllers\ProdutoController;

Route::get('/',[HomeController::class, 'index'])
    ->name('home.index');



Route::get('/categoria', [controllerCategoria::class, 'listaCategoria'])
    ->name('categoria.index');

Route::get('/produto', [ProdutoController::class, 'showProduto'])
    ->name('produto.index');

