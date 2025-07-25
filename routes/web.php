<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $nome = 'João Pedro';
    $idade = 25;
    $habilidades = ['PHP', 'Laravel', 'JavaScript'];
    return view('welcome', [
        'nome' => $nome,
        'idade' => $idade,
        'habilidades' => $habilidades
    ]);
});

Route::get('/categoria', function () {
    return view('categoria');
});
