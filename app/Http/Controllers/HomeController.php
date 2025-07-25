<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index() {

         $nome = 'João Pedro';
        $idade = 25;
        $habilidades = ['PHP', 'Laravel', 'JavaScript'];
        return view('welcome', [
            'nome' => $nome,
            'idade' => $idade,
            'habilidades' => $habilidades
    ]);
    }
}
