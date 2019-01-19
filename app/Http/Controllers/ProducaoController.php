<?php

namespace PGD\Http\Controllers;

use PGD\Producao;
use PGD\Pessoa;
use PGD\Prato;
use Illuminate\Http\Request;

class ProducaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages/listproducoes');
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
            $producao = new Producao();
            $producao->data = $request->datepicker;
            if($request->cozinheiro !== 'Escolha'){
                $producao->pessoa()->associate(Pessoa::find(explode ( '/' , $request->cozinheiro)[1]));
            }
            $producao->save();
        }else {
            $producao = Producao::find($request->id);
        }
        $pratostransfer = explode ( ',' , $request->transfer);
        $pratosid=[];
        foreach ($pratostransfer as $key => $prato) {
            array_push($pratosid,$prato+1);
        }
        $producao->prato()->sync($pratosid);
        $request->session()->flash('status','Produções cadastrado/atualizado com sucesso!');
        return back();
    }
    /**
     * Display the specified resource.
     *
     * @param  \PGD\Producao  $producao
     * @return \Illuminate\Http\Response
     */
    public function show($id = 0)
    {
        if($id!=0) {
            $producao = Producao::find($id);
            return view ('pages/formproducao',['producao'=>$producao]);
        }
        $cozinheiros = Pessoa::all();
        return view ('pages/formproducao',['cozinheiros'=>$cozinheiros]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \PGD\Producao  $producao
     * @return \Illuminate\Http\Response
     */
    public function edit(Producao $producao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \PGD\Producao  $producao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producao $producao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \PGD\Producao  $producao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $producao = Producao::find($request->id);
        $producao->delete();
        $request->session()->flash('status','Producao deletado com sucesso!');
        return back();
    }
    
    public function listarproducoes() {
        $producoes = Producao::all();
        foreach ($producoes as $key => $value) {
            /*
            https://www.codigofonte.com.br/codigos/criar-um-objeto-sem-escrever-uma-classe-no-php
            */
            $value->cozinheiro = Pessoa::find($value->pessoa_id)->nome;
        }

        return $producoes;
    }
}
