<?php

namespace PGD\Http\Controllers;

use PGD\Producao;
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
        var_dump($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \PGD\Producao  $producao
     * @return \Illuminate\Http\Response
     */
    public function show($id = 0)
    {
        // $insumos = Insumo::all();
        if($id!=0) {
            $prato = Prato::find($id);

            return view ('pages/formproducao',['insumos'=> $insumos,'prato'=>$prato]);
        }
        return view ('pages/formproducao');
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
