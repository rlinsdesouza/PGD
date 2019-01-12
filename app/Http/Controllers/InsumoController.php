<?php

namespace PGD\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PGD\Insumo;


class InsumoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function listarinsumos() {
        // return DB::table('insumos')->get();        
        // return DB::table('insumos')->paginate(15);
        return Insumo::all();
        // return response()->json(['data'=>Insumo::all()]);
        // return response()->json(['data'=>DB::table('insumos')->get()]); 


    }
}
