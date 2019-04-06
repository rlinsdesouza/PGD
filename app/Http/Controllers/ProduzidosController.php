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
    public function index(Request $request)
    {
        // $this->listardia($request);
        return view('pages/listavaliar',['produzidos'=>$this->listardia($request)]);
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
        // $request->session()->flash('status','Produções avaliadas/atualizadas com sucesso!');
        // return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $dia)
    {
        // $this->listardia($request,$dia);        
        return view('pages/listavaliar',['produzidos'=>$this->listardia($request, $dia)]);
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
    public function listardia($request, $dia=0)
    {

        if(!$request->data && $dia==0) {
            $producoes = Producao::where('data','2019-04-05')->get();

        }else{
            $producoes = Producao::where('data',$dia)->get();
        }
        $retorno = [];
        
        $objeto = (object) array(); 
        foreach ($producoes as $key => $producao) {
            $produzidos = Produzido::where('producao_id',$producao->id)->get();
            foreach ($produzidos as $key => $produzido) {
                $teste = 1;
                if($produzido->avaliacaos) {
                    foreach($produzido->avaliacaos as $key => $avaliacao){

                        if($avaliacao->pessoa->id == $request->user()->id) {
                            $teste = 0;
                        }
                    }
                }
                if($teste) {
                    $objeto->id = $produzido->id;
                    $objeto->data = $producao->data;
                    $objeto->prato = Prato::find($produzido->prato_id)->nome;
                    $objeto->cozinheiro=$producao->pessoa->nome;
                    array_push($retorno,$objeto);
                }
                $objeto = (object) array();
            } 
        }
        return $retorno;
    }
}
