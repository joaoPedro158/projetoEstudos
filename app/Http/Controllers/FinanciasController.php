<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FinanciasController extends Controller
{
     public function index()
    {
        return view('Financias');
    }
}
