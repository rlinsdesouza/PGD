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
        // return DB::table('insumos')->paginate(15);
        // return response()->json(['links'=> '{
        //     "pagination": {
        //         "total": 50,
        //         "per_page": 15,
        //         "current_page": 1,
        //         "last_page": 4,
        //         "from": 1,
        //         "to": 15,
        //     }'
        // ,'data'=> Insumo::all()]);
        return Insumos::all(); 
    }
}
