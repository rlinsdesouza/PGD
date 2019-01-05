<?php

namespace PGD\Http\Controllers;

use Illuminate\Http\Request;
use PGD\Insumo;


class InsumoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function listarinsumos() {
        return Insumo::all(); 
    }
}
