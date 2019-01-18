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
            $pratos = explode ( ',' , $request->transfer);
            foreach ($pratos as $key => $prato) {
                $producao = new Producao();
                $producao->data = $request->datepicker;
                $producao->prato()->associate(Prato::find($prato+1));
                if($request->cozinheiro !== 'Escolha'){
                    $producao->pessoa()->associate(Pessoa::find(explode ( '/' , $request->cozinheiro)[1]));
                }
                $producao->save();
            }
        }else {
            $prato = Prato::find($request->id);
        }
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
        $cozinheiros = Pessoa::all();
        if($id!=0) {
            $prato = Prato::find($id);

            return view ('pages/formproducao',['cozinheiros'=> $cozinheiros,'prato'=>$prato]);
        }
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
    public function destroy(Producao $producao)
    {
        //
    }
}
