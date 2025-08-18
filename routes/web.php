<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\controllerCategoria;
use App\Http\Controllers\CriarContaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FinanciasController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\carinhoCompraController;


Route::get('/',[HomeController::class, 'index'])
    ->name('home.index');



Route::get('/categoria', [controllerCategoria::class, 'listaCategoria'])
    ->name('categoria.index');


Route::get('/criar', [CriarContaController::class, 'index'])
    ->name('CriarConta.index');

Route::post('/CriarConta', [CriarContaController::class, 'store'])
    ->name('CriarConta.store');

// Route::get('/login', [LoginController::class, 'index'])
//     ->name('Login.index');

Route::get('/Financias', [FinanciasController::class, 'index'])
    ->name('Financias.index');

Route::get('/produto/{id}', [ProdutoController::class, 'show'])
    ->name('produto.show');

Route::get('/carinhoCompra', [carinhoCompraController::class, 'index'])
    ->name('carinhoCompra.index');





    // Rota para adiminsitradores
Route::get('/adicionarProduto', [ProdutoController::class, 'index'])
    ->name('adicionarProduto.index');

Route::post('/adicionarProduto', [ProdutoController::class, 'store'])
    ->name('adicionarProduto.store');


// Rota para autenticação e dashboard
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
