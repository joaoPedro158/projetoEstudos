<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\controllerCategoria;

Route::get('/',[HomeController::class, 'index'])
    ->name('home.index');



Route::get('/categoria', [controllerCategoria::class, 'index'])
    ->name('categoria.index');
