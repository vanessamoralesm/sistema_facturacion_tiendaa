<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TiendaController extends Controller
{
    public function index()
    {
        return view('dashboard'); // o la vista que deseas mostrar
    }
}