<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CriarContaController extends Controller {
    public function index() {
        return view('CriarConta');
    }

    public function store(Request $request)
    {
        // Lógica para criar a conta
        // Validar os dados do formulário, criar o usuário, etc.

        return redirect()->route('home.index')->with('success', 'Conta criada com sucesso!');
    }
}
