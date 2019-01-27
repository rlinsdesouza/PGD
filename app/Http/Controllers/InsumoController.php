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


    public function forminsumo($id = 0) {
        if($id!=0) {
            $insumo = Insumo::find($id);

            return view ('pages/forminsumo',['insumo'=> $insumo]);
        }
        return view ('pages/forminsumo');
    }

    public function salvarinsumo(Request $request) {
        if (!$request->id) {
            $insumo = new Insumo ();
        }else {
            $insumo = Insumo::find($request->id);
        }
        $insumo->nome = strtoupper($request->nome);
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
        $request->session()->flash('status','Insumo cadastrado/atualizado com sucesso!');
        return back();
    }

    public function excluir (Request $request) {
        $insumo = Insumo::find($request->id);
        $insumo->delete();
        $request->session()->flash('status','Insumo deletado com sucesso!');
        return back();
    }
    
    public function listagem() {
        return view('pages/listinsumo');
    }

    public function listarinsumos() {
        return Insumo::all();
    }
}
