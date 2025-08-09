<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\controllerCategoria;
use App\Http\Controllers\CriarContaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\LoginController;

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
