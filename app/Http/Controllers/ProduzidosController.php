<?php

namespace PGD\Http\Controllers;

use Illuminate\Http\Request;
use PGD\Produzido;
use PGD\Producao;
use PGD\Prato;



class ProduzidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($dia=0)
    {
        if(!$dia) {
            return view('pages/listavaliar',['dia'=>'index']);
        }
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
        // if (!$request->id) {
        //     $producao = new Producao();
        //     $producao->data = $request->datepicker;
        //     if($request->cozinheiro !== 'Escolha'){
        //         $producao->pessoa()->associate(Pessoa::find(explode ( '/' , $request->cozinheiro)[1]));
        //     }
        //     $producao->save();
        // }else {
        //     $producao = Producao::find($request->id);
        // }
        // $pratostransfer = explode ( ',' , $request->transfer);
        // $pratosid=[];
        // foreach ($pratostransfer as $key => $prato) {
        //     array_push($pratosid,$prato+1);
        // }
        // $producao->prato()->sync($pratosid);
        // $request->session()->flash('status','Produções cadastrado/atualizado com sucesso!');
        // return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produzidos = [];
        $produzido = Produzido::find($id);
        $produzido->prato = Prato::find($produzido->prato_id);
        $produzido->producao= Producao::find($produzido->producao_id);
        array_push($produzidos,$produzido);
        return view('pages/formavaliacao',['produzidos'=>$produzidos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function listardia($dia)
    {
        if($dia === 'index') {
            $producoes = Producao::where('data',date('Y-m-d'))->get();
        }else{
            // $producoes = Producao::where('data',date('Y-m-d'))->get();
        }
        $retorno = [];
        $objeto = (object) array(); 
        foreach ($producoes as $key => $producao) {
            foreach ($producao->prato as $prato) {
               $objeto->id = Produzido::where([['producao_id',$producao->id],['prato_id',$prato->id]])->first()->id;
               $objeto->data = $producao->data;
               $objeto->prato = $prato->nome;
               $objeto->cozinheiro=$producao->pessoa->nome;
               array_push($retorno,$objeto);
               $objeto = (object) array();       
            }
        }
        return $retorno;
    }
}
