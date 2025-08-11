<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class CriarContaController extends Controller {
    public function index() {
        return view('CriarConta');
    }

    public function store(Request $request) {
        // Validação dos dados do formulário
        $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6|confirmed',
        ]);

        // Criação do usuário
        $criarConta = new User;

        $criarConta->name = $request->input('name');
        $criarConta->email = $request->input('email');
        $criarConta->password = bcrypt($request->input('password'));

        $criarConta->save();


        return redirect()->route('Login.index')->with('success', 'Conta criada com sucesso!');
    }
}
