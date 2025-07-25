<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controllerCategoria extends Controller
{
    
    public function index()
    {
        return view('categoria');
    }
}
