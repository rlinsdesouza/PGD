<?php

namespace PGD\Http\Controllers;

use PGD\Prato;
use PGD\Insumo;
use Illuminate\Http\Request;

class PratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->id) {
            $prato = new Prato ();
        }else {
            $prato = Prato::find($request->id);
        }
        $prato->nome = $request->nome;
        if(strcmp($request->lactose ,'on')==0) {
            $prato->lactose = 'S';
        }else {
            $prato->lactose = 'N';
        }
        if(strcmp($request->gluten ,"on")==0) {
            $prato->gluten = 'S';
        }else {
            $prato->gluten = 'N';
        }
        $prato->receita = $request->receita;
        $prato->dificuldade = 0;
        if($request->addinsumo !== 'Escolha') {
            $insumo->pratos()->attach(explode ( '/' , $request->addinsumo)[1]);
            $prato->insumos()->attach(explode ( '/' , $request->addinsumo)[1]);
        }

        $prato = $prato->save();
        $insumo = $insumo->save();
        $request->session()->flash('status','Prato cadastrado/atualizado com sucesso!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \PGD\Prato  $prato
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $insumos = Insumo::all();
        return view ('pages/formprato', compact('insumos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \PGD\Prato  $prato
     * @return \Illuminate\Http\Response
     */
    public function edit(Prato $prato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \PGD\Prato  $prato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prato $prato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \PGD\Prato  $prato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prato $prato)
    {
        //
    }
    public function listagem() {
        return view('pages/listprato');
    }
}
