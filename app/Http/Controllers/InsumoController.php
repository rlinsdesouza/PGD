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


    public function forminsumo($id = 0) {
        if($id!=0) {
            $insumo = Insumo::find($id);
            return view ('pages/insumos',['insumo'=> $insumo]);
        }
        return view ('pages/forminsumo');
    }

    public function salvarinsumo(Request $request) {
        if (!$request->id) {
            $insumo = new Insumo ();
        }else {
            $insumo = Insumo::find($request->id);
        }
        $insumo->nome = $request->nome;
        if(strcmp($request->lactose ,'on')==0) {
            $insumo->lactose = 'S';
        }else {
            $insumo->lactose = 'N';
        }
        if(strcmp($request->gluten ,"on")==0) {
            $insumo->gluten = 'S';
        }else {
            $insumo->gluten = 'N';
        }

        $insumo = $insumo->save();
        // $insumo = $insumo->create($request->all());
        $request->session()->flash('status','Insumo cadastrado/atualizado com sucesso!');
        return back();
    }
    
    public function listarinsumos() {
        // return DB::table('insumos')->get();        
        // return DB::table('insumos')->paginate(15);
        return Insumo::all();
        // return response()->json(['data'=>Insumo::all()]);
        // return response()->json(['data'=>DB::table('insumos')->get()]); 


    }
}
