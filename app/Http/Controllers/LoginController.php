<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller {
    public function index()
    {
        return view('Login');
    }

    public function login(Request $request)
    {
        // Lógica de autenticação do usuário
        // Validar as credenciais e redirecionar conforme necessário
        return redirect()->route('home.index');
    }
}
