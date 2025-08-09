<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto; // Adicione este import

class HomeController extends Controller
{
    public function index() {
        $nome = 'João Pedro';
        $idade = 25;
        $habilidades = ['PHP', 'Laravel', 'JavaScript'];
        $produto = Produto::all(); // Buscando os produtos

        return view('welcome', [
            'nome' => $nome,
            'idade' => $idade,
            'habilidades' => $habilidades,
            'produto' => $produto // Passando para a view
        ]);
    }
}
